<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/25
 * Time: 14:38
 * Created by PhpStorm.
 */
namespace CrCms\Document\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }

    public function rules()
    {
        return [
            //'type' =>'required',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必须输入'
        ];
    }

    public function attributes()
    {
        return [];
    }
}

