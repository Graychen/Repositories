<?php
namespace graychen\repositories\Criteria;
use graychen\repositories\Contracts\RepositoryInterface as Repository;
use graychen\repositories\Contracts\RepositoryInterface;
abstract class Criteria{
    public abstract function apply($model,Repository $repository);
}