<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:36
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Models\DocumentModel;
use CrCms\Document\Services\Documents\Contracts\Document as DocumentContract;
use CrCms\Document\Services\Fields\AbstractField;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class Document
 * @package CrCms\Modules\document\src\Services\Documents
 */
class Document implements DocumentContract
{
    protected $fields;

    public function __construct(Collection $fields)
    {
        $this->fields = $this->resolveFields($fields);
    }

    protected function resolveFields(Collection $fields): Collection
    {
        return $fields->mapWithKeys(function (array $field) {
            $object = new $field['type']($field);

            foreach ($field as $key => $value) {
                $method = Str::studly("set_{$key}");
                method_exists($object, $method) ? call_user_func([$object, $method], $value) : null;
            }

            unset($key, $value);

            return [$object->getName() => $object];
        });
    }

    public function getFields(): Collection
    {
        return $this->fields;
    }

    public function list(Collection $collects): Collection
    {
        return $collects->map(function (DocumentModel $model) {
            return $this->allowFields('list')->mapWithKeys(function (AbstractField $field, string $name) use ($model) {
                return [$name => $field->setValue($model->{$name}, AbstractField::VALUE_DISPLAY)->getValue()];
            })->toArray();
        });
    }

    public function create(): Collection
    {
        return $this->allowFields('create')->mapWithKeys(function (AbstractField $field, string $name) {
            return [$name => $field->render()];
        });
    }

    public function update(array $data): array
    {
        return $this->allowFields('update')->mapWithKeys(function (AbstractField $field, string $name) use ($data) {
            return [$name => $field->setValue($data[$name],AbstractField::VALUE_STORE)->getValue()];
        })->toArray();
    }

    public function store(array $data): array
    {
        return $this->allowFields('store')->mapWithKeys(function (AbstractField $field, string $name) use ($data) {
            return [$name => $field->setValue($data[$name],AbstractField::VALUE_STORE)->getValue()];
        })->toArray();
    }

    public function edit(DocumentModel $model): Collection
    {
        return $this->allowFields('edit')->mapWithKeys(function (AbstractField $field, string $name) use ($model) {
            return [$name => $field->setValue($model->{$name},AbstractField::VALUE_DISPLAY)->render()];
        });
    }

    public function search(array $data): array
    {
        return $this->allowFields('search')->mapWithKeys(function (AbstractField $field, string $name) use ($data) {
            return [$name => $field->setValue($data[$name],AbstractField::VALUE_STORE)->getValue()];
        })->toArray();
    }

    public function single(DocumentModel $model): array
    {
        return $this->allowFields('single')->mapWithKeys(function (AbstractField $field, string $name) use ($model) {
            return [$name => $field->setValue($model->{$name},AbstractField::VALUE_DISPLAY)->getValue()];
        })->toArray();
    }

    public function destroy(array $data): array
    {
//        return $this->allowFields('destroy')->mapWithKeys(function (AbstractField $field, string $name) {
//            return [$name => $field->setValue($model->{$name},AbstractField::VALUE_STORE)->getValue()];
//        })->toArray();
    }

    /**
     * @param string $type
     * @return Collection
     */
    protected function allowFields(string $type): Collection
    {
        return $this->fields->filter(function (AbstractField $field, $name) use ($type) {
            return in_array($type, $field->getRoles(), true);
        });
    }
}