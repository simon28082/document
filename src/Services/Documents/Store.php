<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 14:17
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Services\Documents\Contracts\Document;
use CrCms\Document\Services\Fields\AbstractField;
use Illuminate\Support\Collection;

/**
 * Class Store
 * @package CrCms\Document\Services\Documents
 */
class Store extends AbstractDocument implements Document
{

    protected $data;

    public function __construct(Collection $fields, array $data = [])
    {
        parent::__construct($fields);
        $this->data = $data;
    }

    public function handle(string $role)
    {
        return $this->allowFields($role)->mapWithKeys(function(AbstractField $field, string $name){
            return [$name => $field->setValue($this->data[$name] ?? null)->storeValue()];
        })->toArray();
    }
}