<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 15:30
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;
use CrCms\Document\Models\DocumentModel;
use CrCms\Document\Services\Fields\AbstractField;
use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use CrCms\Document\Services\Documents\Contracts\Document;

/**
 * Class Many
 * @package CrCms\Document\Services\Documents
 */
class Many extends AbstractDocument implements Document
{
    protected $collects;

    public function __construct(Collection $fields,$collects)
    {
        parent::__construct($fields);
        $this->collects = $collects;
    }

    public function handle(string $role)
    {
        if ($this->collects instanceof AbstractPaginator) {
            $this->collects->setCollection($this->resolveCollects($this->collects->getCollection()));
        } elseif ($this->collects instanceof Collection) {
            $this->collects = $this->resolveCollects($this->collects);
        } else {
            throw new InvalidArgumentException('Params Error');
        }

        return $this->collects;
//        return new ResourceCollection($this->collects);
//        return $collects->map(function (DocumentModel $model) {
//            return $this->allowFields('list')->mapWithKeys(function (AbstractField $field, string $name) use ($model) {
//                return [$name => $field->setValue($model->{$name} ?? null)->displayValue()];
//            })->toArray();
//        });
    }

    protected function resolveCollects(Collection $collects): Collection
    {
        return $collects->map(function (DocumentModel $model) {
            return $this->allowFields('list')->mapWithKeys(function (AbstractField $field, string $name) use ($model) {
                return [$name => $field->setValue($model->{$name} ?? null)->displayValue()];
            });
        });
    }
}

