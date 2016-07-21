<?php
namespace Repositories\Eloquent;

use Repositories\Contracts\CriteriaInterface;
use Repositories\Criteria\Criteria;
use Repositories\Contracts\RepositoryInterface;
use Repositories\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
    * @brief 仓储接口
 */
abstract class Repository implements RepositoryInterface,CriteriaInterface{
    private $app;
    protected $model;
    protected $criteria;
    protected $skipCriteria = false;

    public function __construct(App $app,Collection $collection){
        $this->app = $app;
        $this->criteria = $collection;
        $this->resetScope();
        $this->makeModel();
    }

    abstract function model();

    public function all($columns = array('*')){
      return $this->model->get($columns); 
    }

    public function paginate($perPage = 15,$columns=array('*')){
        return $this->model->paginate($perPage,$columns);
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function update(array $data,$id,$attribute="id"){
        return $this->model->where($attribute,'=',$id)->update($data);
    }

    public function delete($id){
        return $this->model->destory($id);
    }

    public function find($id,$columns=array('*')){
        return $this->model->find($id,$columns);
    }

    public function findBy($attribute,$value,$columns=array('*')){
        return $this->model->where($attribute,'=',$value)->first($columns);
    }

    public function makeModel(){
        $model = $this->app->make($this->model);

        if(!$model instanceof Model){
            throw new RepositoryException("Class {this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model->newQuery();
    }

}
