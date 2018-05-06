<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 14:21
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Models\DocumentModel;
use CrCms\Document\Services\Documents\Contracts\Document;
use CrCms\Document\Services\Fields\AbstractField;
use Illuminate\Support\Collection;

/**
 * Class Single
 * @package CrCms\Modules\document\src\Services\Documents
 */
class Single extends AbstractDocument implements Document
{
    protected $documentModel;

    public function __construct(Collection $fields, DocumentModel $documentModel)
    {
        parent::__construct($fields);
        $this->documentModel = $documentModel;
    }

    public function handle(string $role)
    {
        return $this->allowFields($role)->mapWithKeys(function(AbstractField $field, string $name){
            return [$name => $field->setValue($this->documentModel->{$name} ?? null)->displayValue()];
        })->toArray();
    }


}