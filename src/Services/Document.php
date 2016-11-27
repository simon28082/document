<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 16-11-26
 * Time: 下午9:33
 */

namespace CrCms\Document\Services;


use CrCms\Category\Models\Category;
use CrCms\Form\FormBehaviorInterface;
use CrCms\Form\FormConfigInterface;
use CrCms\Form\RenderDrives\CheckboxRender;
use CrCms\Form\RenderDrives\FullTextRender;
use CrCms\Form\RenderDrives\InputRender;
use CrCms\Form\RenderDrives\RadioRender;
use CrCms\Form\RenderDrives\SelectRender;
use CrCms\Form\RenderDrives\TextareaRender;
use Illuminate\Database\Eloquent\Model;

class Document implements FormConfigInterface  ,FormBehaviorInterface
{

    public function store(array $data) : Model
    {
       $model =  \CrCms\Document\Models\Document::create($data);
        return $model;
    }

    public function update(array $data, $id) : Model
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function hash() : string
    {
        return sha1(get_class($this));
    }

    protected function createFormName(string $name) : string
    {
        return $this->hash().'['.$name.']';
    }

    public function attributes() : array
    {
        return [
          'title'=>[
                'drive'=>InputRender::class,
                'name'=>$this->createFormName('title'),
                'attribute'=>['type'=>'text','class'=>'form-control'],
                'label'=>'标题',
          ],
            'content'=>[
                'drive'=>FullTextRender::class,
                'name'=>$this->createFormName('content'),
                'attribute'=>[],
                'label'=>'内容',
            ],
            'status'=>[
                'drive'=>RadioRender::class,
                'name'=>$this->createFormName('status'),
                'label'=>'状态',
                'value'=>1,
                'option'=>[1=>'正常',2=>'禁止']
            ],
            'sort'=>[
                'drive'=>InputRender::class,
                'name'=>$this->createFormName('sort'),
                'attribute'=>['type'=>'number','class'=>'form-control'],
                'label'=>'排序',
            ],
            'category_id'=>[
                'drive'=>SelectRender::class,

                'name'=>$this->createFormName('category_id'),
                'attribute'=>['class'=>'form-control','multiple'=>'multiple'],
                'option'=>Category::pluck('name','id')->toArray(),
                'value'=>0,
            ],
            'checkbox'=>[
                'drive'=>CheckboxRender::class,
                'name'=>$this->createFormName('checkbox'),
                'attribute'=>[],
                'option'=>['test1','test2'],
                'label'=>'checkbox'
            ]
        ];
    }

    public function rules() : array
    {
    }

    public function table() : string
    {
        return 'document';
    }


}