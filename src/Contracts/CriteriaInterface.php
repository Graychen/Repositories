<?php
namespace Repositories\Contracts;
use Repositories\Criteria\Criteria;

interface CriteriaInterface{
    public function skipCriteria($status = true);
    public function getCriteria();
    public function getByCriteria(Criteria $criteria);
    public function applyCriteria();
}
