<?php
namespace graychen\repositories\Contracts;
interface RepositoryInterface{
    public function all($columns = array('*'));
    public function paginate($perPage = array('*'));
    public function create(array $data);
    public function update(array $data,$id);
    public function delete($id);
    public function find($id,$columns = array('*'));
    public function findBy($field,$value,$columns=array('*'));
}