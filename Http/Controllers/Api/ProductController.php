<?php

namespace Khaleds\LaravelProduct\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Khaleds\LaravelProduct\Events\Product\StoreProductStartEvent;
use Khaleds\LaravelProduct\Events\StoreProductEvent;
use Khaleds\LaravelProduct\Http\Requests\Product\StoreRequest;
use Khaleds\LaravelProduct\Http\Requests\Product\UpdateRequest;
use Khaleds\LaravelProduct\Libraries\ApiResponseLibrary;
use Khaleds\LaravelProduct\Libraries\MediaLibrary;
use Khaleds\LaravelProduct\Repositories\ProductRepository;
use Khaleds\LaravelProduct\Http\Requests\Product\FindRequest;

class ProductController extends Controller
{
    //

    protected $model;
    public function __construct(ProductRepository $product)
    {

        $this->model = $product;
    }


    public function index()
    {
        //
        $data=$this->model->getAll();

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }



    public function store(StoreRequest $request)
    {
        $inputs=$request->validated();

        event(new StoreProductStartEvent());

        $image=MediaLibrary::UploadImage('Products');

        if (!$image['status'])
            return ApiResponseLibrary::ResponseError($image['message']);


        $inputs['image']=$image['data'];

        $data=$this->model->create($inputs);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        $request->merge(['product_id'=>$data['data']['id']]);

            event(new StoreProductEvent($data['data'],$request));

        return ApiResponseLibrary::ResponseWithData($data['data']);

    }


    public function update(UpdateRequest $request)
    {
        $inputs=$request->validated();

        $data=$this->model->find($inputs['id']);

        //move ot to service maybe
        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);

        $image=MediaLibrary::UpdateImage('Products',$data['data']['image']);

        $inputs['image']=$image['data'];

        if (!$image['status'])
            return ApiResponseLibrary::ResponseError($image['message']);


        $data=$this->model->update($inputs,$data['data']['id']);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        //fire event
        event(new StoreProductEvent($data['data']));

        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

    //check for allawing api to chose wich (with) he need
    public function show(FindRequest $request){

        $inputs=$request->validated();

        $data=$this->model->find($inputs['id']);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

    //how to make my views components or how he will use them in his theme and if spratoly available
    public function destroy(FindRequest $request){

        $inputs=$request->validated();

        $data=$this->model->delete($inputs['id']);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);

        MediaLibrary::DeleteImage($data['data']['image']);



        return ApiResponseLibrary::ResponseWithData($data['data']);

    }


}
