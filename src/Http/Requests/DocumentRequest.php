<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/9
 * Time: 15:33
 */

namespace CrCms\Document\Http\Requests;


use CrCms\Document\Forms\DocumentForm;
use CrCms\Kernel\Http\Requests\KernelRequest;

class DocumentRequest extends KernelRequest
{

    public function rules()
    {
        return form()->rules();
    }

}