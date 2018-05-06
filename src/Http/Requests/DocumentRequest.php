<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DocumentRequest
 * @package CrCms\Document\Http\Requests\Document
 */
class DocumentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'model_id' => ['required', ]
        ];
    }

}