<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 14:00
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;
use CrCms\Document\Services\Fields\AbstractField;
use Illuminate\Support\Collection;

/**
 * Class AbstractDocument
 * @package CrCms\Document\Services\Documents
 */
abstract class AbstractDocument
{
    protected $fields;

    public function __construct(Collection $fields)
    {
        $this->fields = $fields;
    }

    public function allowFields(string $type): Collection
    {
        return $this->fields->filter(function (AbstractField $field, $name) use ($type) {
            return in_array($type, $field->roles(), true);
        });
    }
}