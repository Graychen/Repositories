<?php
namespace graychen\repositories\Criteria;

use Repositories\Contracts\RepositoryInterface as Repository;
use Repositories\Contracts\RepositoryInterface;

abstract class Criteria{
    public abstract function apply($model,Repository $repository);
}
