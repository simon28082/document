<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/18
 * Time: 16:16
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{

    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必须输入',
            'title.min' => '标题不能小于2个字符',
            'body.required' => '内容必须输入',
            'body.min' => '内容必须大于3个字符',
            'category_id.required' => '请选择分类',
            'category_id.numeric' => '分类信息有误，请重新选择'
        ];
    }

    public function attributes()
    {
        return [];
    }
}
