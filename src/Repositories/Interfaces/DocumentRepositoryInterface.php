<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 14:03
 */

namespace CrCms\Document\Repositories\Interfaces;


use CrCms\Kernel\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface DocumentRepositoryInterface
{

    /**
     * @param array $columns
     * @return mixed
     */
    public function all(array $columns = ['*']);


    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function findAllPaginate(int $perPage = 15, array $columns = ['*']);


    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) : Model;


    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,string $id) : Model;


    /**
     * @param int $id
     * @return mixed
     */
    public function delete(string $id);


    /**
     * @param int $id
     * @param array $columns
     * @return mixed
     */
    public function findById(string $id, array $columns = ['*']);


    /**
     * @param string $field
     * @param string $value
     * @param array $columns
     * @return mixed
     */
    public function findOneBy(string $field,string $value,array $columns = ['*']);


    /**
     * @param string $field
     * @param string $value
     * @param array $columns
     * @return mixed
     */
    public function findBy(string $field,string $value,array $columns = ['*']);

}