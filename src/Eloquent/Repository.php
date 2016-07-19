<?php
namespace Repositories\Eloquent;

use Repositories\Contracts\RepositoryInterface;
use Repositories\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
    * @brief 仓储接口
 */
abstract class Repository implements RepositoryInterface{
    private $app;
    protected $model;

    public function __construct(App $app){
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    pulic function makeModel(){
        $model = $this->app->make($this->model);

        if(!$model instanceof Model){
            throw new RepositoryException("Class {this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

}
