<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 13:16
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Repositories;

use CrCms\Document\Models\Model;
use CrCms\Document\Services\Fields\DateTime;
use CrCms\Document\Services\Fields\Input;
use CrCms\Document\Services\Fields\PrimaryKey;
use CrCms\Document\Services\Fields\UserId;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class ModelRepository
 * @package CrCms\Document\Repositories
 */
class ModelRepository extends AbstractRepository
{
    protected $guard = ['name', 'table_name', 'status', 'built_fields'];

    /**
     * @return Model
     */
    public function newModel(): Model
    {
        return app(Model::class);
    }

    public function fields(Model $model, array $data = []): Collection
    {
        $fields = [
            [
                'name' => 'title',
                'type' => Input::class,
                'roles' => ['create', 'list', 'single', 'store_rule', 'store', 'edit', 'update'],
                'config' => [
                    'type' => 'input',
                ]
            ],
            [
                'name' => 'content',
                'type' => Input::class,
                'roles' => ['create', 'list', 'single', 'store_rule', 'store', 'edit', 'update'],
                'config' => [
                    'type' => 'textarea',
                ]
            ]
        ];


//        if (isset($model->build_in_field) && $model->build_in_field === 1) {
        $fields = array_merge($fields, $this->builtInFields());
//        }

        return collect($fields)->mapWithKeys(function (array $field) use ($data) {
//            $field['value'] = $data[$field['name']] ?? null;
            $object = new $field['type']($field, $data);

//            if (isset($data[$field['name']])) {
//
//            }
//
//            foreach ($field as $key => $value) {
//                $method = Str::studly("set_{$key}");
//                method_exists($object, $method) ? call_user_func([$object, $method], $value) : null;
//            }
//
//            unset($key, $value);

            return [$object->name() => $object];
        });
    }

    protected function builtInFields(): array
    {
        return [
            [
                'name' => '_id',
                'roles' => ['list', 'single', 'edit', 'update'],
                'type' => PrimaryKey::class
            ],
            [
                'name' => 'created_at',
                'roles' => ['list', 'single'],
                'type' => DateTime::class,
                'config' => [
                ],
            ],
//            [
//                'name' => 'updated_at',
//                'roles' => ['list', 'single'],
//            ],
            [
                'name' => 'created_uid',
                'roles' => ['store', 'list', 'single'],
                'type' => UserId::class,
//                'store_format' => function ($value) {
//                    return $value;
//                },
//                'display_format' => function ($value) {
//                    return $value;
//                }
            ],
            [
                'name' => 'updated_uid',
                'roles' => ['store', 'update', 'list', 'single'],
                'type' => UserId::class,
            ],
//            [
//                'name' => 'deleted_uid',
//                'roles' => []
//            ],
        ];
    }


    public static function defaultBuiltInFields(): array
    {
        return [
            'created_uid' => [],
            'updated_uid' => []
        ];
    }
}