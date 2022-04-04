<?php

namespace Khaleds\LaravelProduct\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Khaleds\LaravelProduct\Http\Requests\Category\FindRequest;
use Khaleds\LaravelProduct\Http\Requests\Category\UpdateRequest;
use Khaleds\LaravelProduct\Http\Requests\Category\StoreRequest;
use Khaleds\LaravelProduct\Libraries\MediaLibrary;
use Khaleds\LaravelProduct\Repositories\CategoryRepository;
use Khaleds\LaravelProduct\Libraries\ApiResponseLibrary;

class CategoryController extends Controller
{
    //
    protected $model;
    public function __construct(CategoryRepository $category)
    {

        $this->model = $category;
    }


    public function index(){

        $data=$this->model->getAll();

        if (!$data['status'])
             return ApiResponseLibrary::ResponseError($data['message']);

        return ApiResponseLibrary::ResponseWithData($data['data']);
    }


    public function store(StoreRequest $request){

        $inputs=$request->validated();

        $image=MediaLibrary::UploadImage('Categories');

        //check if we can push validation errors
        if (!$image['status'])
            return ApiResponseLibrary::ResponseError($image['message']);

        $data=$this->model->create($inputs);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

    public function update(UpdateRequest $request){

        $inputs=$request->validated();

        $data=$this->model->find($inputs['id'],['image']);
        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);

        $image=MediaLibrary::UpdateImage('Categories',$data['data']['image']);

        $inputs['image']=$image['data'];

        //check if we can push validation errors
        if (!$image['status'])
            return ApiResponseLibrary::ResponseError($image['message']);



        $data=$this->model->update($inputs,$inputs['id']);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

    public function find(FindRequest $request){

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
