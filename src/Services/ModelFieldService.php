<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 13:25
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services;

use CrCms\Document\Models\Model;

/**
 * Class ModelFieldService
 * @package CrCms\Document\Services
 */
class ModelFieldService
{
    protected static $modelFields = [];

    public function fields(Model $model)
    {
        if (isset(static::$modelFields[$model->_id])) {
            return static::$modelFields[$model->_id];
        }

        $fields = $model->fields;
        $fields = collect(array_merge($fields, $this->builtInFields()));
        static::$modelFields[$model->_id] = $fields;
        return $fields;
    }

    protected function builtInFields(): array
    {
        return [
            [
                'name' => 'created_at',
                'roles' => ['list', 'single']
            ],
            [
                'name' => 'updated_at',
                'roles' => ['list', 'single'],
            ],
            [
                'name' => 'created_uid',
                'roles' => ['create', 'update', 'store', 'update', 'list', 'single'],
                'store_format' => function($value) {
                    return $value;
                },
                'display_format' => function($value) {
                    return $value;
                }
            ],
            [
                'name' => 'updated_uid',
                'roles' => ['create', 'update', 'store', 'update', 'list', 'single']
            ],
            [
                'name' => 'deleted_uid',
                'roles' => ['create', 'update', 'store', 'update', 'list', 'single']
            ],
        ];
    }

}