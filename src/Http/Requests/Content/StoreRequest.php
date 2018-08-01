<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/18
 * Time: 16:16
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|unique:content,title|min:3|max:255',
            'body'                  => 'required|max:50000|min:5',
            //'user_id'               => 'required|numeric',
            'document_category_id'  => 'required|exists:document_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请输入标题',
            'title.unique'   => '此标题文章已存在',
            'title.min'      => '标题不能少于3个字符',
            'title.max'      => '标题最长不能高于255个字符',
            'body.required'  => '请输入正文内容',
            'body.min'       => '正文内容最小5个字符',
            'body.max'       => '正文内容最大5万字符',
            'document_category_id.required' => '请选择分类',
            'document_category_id.exists'    => '请输入正确的分类'
        ];
    }

    //public function attributes()
    //{
    //    return [];
    //}
}
