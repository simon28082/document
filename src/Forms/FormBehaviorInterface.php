<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/9
 * Time: 15:32
 */

namespace CrCms\Document\Forms;


use Illuminate\Database\Eloquent\Model;

interface FormBehaviorInterface
{

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Model ;


    /**
     * @param array $data
     * @param $id
     * @return array
     */
    public function update(array $data,$id) : Model ;


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}