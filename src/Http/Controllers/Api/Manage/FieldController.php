<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-05 10:21
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class FieldController
 * @package CrCms\Document\Http\Controllers\Api\Manage
 */
class FieldController extends Controller
{
    /**
     * @param string $fieldType
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFieldSettings(string $fieldType)
    {
        $fieldType = Str::studly($fieldType);

        $class = "CrCms\Document\Services\Fields\\{$fieldType}";
        if (!class_exists($class) || $fieldType === 'AbstractField') {
            throw new UnprocessableEntityHttpException(trans('document.field_not_found'));
        }

        $settings = (new $class)->settings();
        return $this->response->data($settings);
    }
}