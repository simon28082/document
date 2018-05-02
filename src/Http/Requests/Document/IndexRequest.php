<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Modules\document\src\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexRequest
 * @package CrCms\Modules\document\src\Http\Requests\Document
 */
class IndexRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {

    }

}