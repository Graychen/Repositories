<?php
namespace graychen\repositories\Contracts;
use graychen\repositories\Criteria\Criteria;
interface CriteriaInterface{
    public function skipCriteria($status = true);
    public function getCriteria();
    public function getByCriteria(Criteria $criteria);
    public function applyCriteria();
}
