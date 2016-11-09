<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/9
 * Time: 15:54
 */

namespace CrCms\Document\Forms;


class FormRender
{

    protected $attributes = [];

    protected $values = [];

    protected $resolveAttributes = ['input','textarea','select','radio'];

    public function __construct(array $attributes,array $values = [])
    {
        $this->attributes = $attributes;
        $this->values = $values;
    }

    protected function input(array $attribute) : string
    {
        $value = $this->values[$attribute['name']] ?? '';
        return "<input type=\"{$attribute['type']}\" name=\"{$attribute['name']}\" value=\"{$value}\" />";
    }


    protected function select(array $attribute) : string
    {

    }


    protected function radio(array $attribute) : string
    {

    }

    public function render() : string
    {
        $html = [];

        foreach ($this->attributes as $attribute)
        {
            if (!in_array($attribute['type'],$this->attributes,true))
            {
                continue;
            }

            $html[$attribute['type']] = $this->{$attribute['type']}($attribute);
        }

        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }
}