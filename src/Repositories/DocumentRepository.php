<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 14:04
 */

namespace CrCms\Document\Repositories;


use CrCms\Document\Models\Document;
use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
use CrCms\Kernel\Repositories\Repository;
use CrCms\Kernel\Repositories\Traits\RepositoryTrait;
use Illuminate\Database\Eloquent\Model;

class DocumentRepository implements DocumentRepositoryInterface
{

    use RepositoryTrait;

    /**
     * Repository constructor.
     * @param Model $Model
     */
    public function __construct(Document $Model)
    {
        $this->model = $Model;
    }


    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,string $id) : Model
    {
        $model = $this->findById($id);

        foreach ($data as $key=>$value)
        {
            $model->{$key} = $value;
        }

        $model->save();

        return $model;
    }


    /**
     * @param int $id
     * @return int
     */
    public function delete(string $id)
    {
        return $this->model->destroy($id);
    }


    /**
     * @param int $id
     * @param array $columns
     * @return mixed
     */
    public function findById(string $id, array $columns = ['*'])
    {
        return $this->model->select($columns)->where($this->model->getKeyName(),$id)->firstOrFail();
    }
}