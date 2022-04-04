<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseRepository implements RepositoryInterface
{

    //@var model
    protected $model;
    private  $returnedMessage=['status'=>true,'message'=>'','data'=>''];
    /*
     * BaseRepository constructor
     * assign any model to the protected var
     * */
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    /*
     * @param columns ,array with entities you want from a table
     * @param relations ,if you want get joined tables
     * @param appends ,if you want to show any data with the request
     * return message if [] else date
     * */
    public function getAll(array $columns=['*'],array $conditions=[],array $relations=[],array $hidden=[],array $appends=[])
    {
        try {
            $this->returnedMessage['data'] = $this->model
                ->with($relations)
                ->where($conditions)
                ->get($columns)
                ->append($appends)
                ->makeHidden($hidden);
        } catch (\Exception $e){
            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']=$e->getMessage();

         }
        return $this->returnedMessage;
    }
    /*
       * @param model_id the model id that you want
       * @param columns ,array with entities you want from a table
       * @param relations ,if you want get joined tables
       * @param appends ,if you want to show any data with the request
       * return message if [] else date
       * */
    public function find($model_id,array $columns=['*'],array $relations=[],array $appends=[])
    {
        try
        {
            $this->returnedMessage['data']= $this->model->select($columns)->with($relations)->findOrFail($model_id)->append($appends);
        }
        catch(ModelNotFoundException $e)
        {
            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']='Model Not Found !';

        }

        return $this->returnedMessage;

    }

    public function create(array $request)
    {
        try {
            $this->returnedMessage['data']=$this->model->create($request)->fresh();
        }
        catch(\Exception $e)
        {
            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;
    }

    public function update(array $request,$id)
    {
        try {
            $model = $this->model->findOrFail($id);
            $model->update($request);
            $this->returnedMessage['data']= $model;
        }
        catch(\Exception $e)
        {

            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;

    }

    public function delete($id)
    {
        try {
            $model = $this->model->findOrFail($id);
            $model->delete();
            $this->returnedMessage['data']= $model;
//            $this->returnedMessage['data']['id']= $id;
        }
        catch(\Exception $e)
        {

            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;
    }
    //this function allow you to insert many records at once
    public function insert(array $request)
    {
        try {
            $this->returnedMessage['data']=$this->model->insert($request);
        }
        catch(\Exception $e)
        {
            $this->returnedMessage['status']=false;
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;
    }

}
