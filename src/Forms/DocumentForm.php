<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/9
 * Time: 15:12
 */

namespace CrCms\Document\Forms;


use Illuminate\Database\Eloquent\Model;

class DocumentForm implements FormConfigInterface,FormBehaviorInterface
{

    /**
     * @return array
     */
    public function attributes() : array
    {
        // TODO: Implement attributes() method.
        return [
            ''
        ];
    }


    /**
     * @return array
     */
    public function rules() : array
    {
        // TODO: Implement rules() method.
        return [
            'title'=>['required','max:255','min:2'],
            'content'=>['required'],
        ];
    }


    /**
     * @return string
     */
    public function table() : string
    {
        // TODO: Implement table() method.
        return 'documents';
    }

    public function store(array $data) : Model
    {
        // TODO: Implement store() method.
    }

    public function update(array $data, $id) : Model
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }


}