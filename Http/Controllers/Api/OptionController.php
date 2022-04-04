<?php

namespace Khaleds\LaravelProduct\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Khaleds\LaravelProduct\Http\Requests\Option\StoreRequest;
use Khaleds\LaravelProduct\Http\Requests\Option\UpdateRequest;
use Khaleds\LaravelProduct\Http\Requests\Option\FindRequest;
use Khaleds\LaravelProduct\Libraries\ApiResponseLibrary;
use Khaleds\LaravelProduct\Repositories\OptionRepository;

class OptionController extends Controller
{
    //
    protected $model;
    public function __construct(OptionRepository $category)
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

        $data=$this->model->create($inputs);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

    public function update(UpdateRequest $request){

        $inputs=$request->validated();

        $data=$this->model->update($inputs,$inputs['id']);

        if (!$data['status'])
            return ApiResponseLibrary::ResponseError($data['message']);


        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

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

        return ApiResponseLibrary::ResponseWithData($data['data']);

    }

}
