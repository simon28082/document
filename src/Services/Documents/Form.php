<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 13:54
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Models\DocumentModel;
use CrCms\Document\Services\Fields\AbstractField;
use CrCms\Document\Services\Documents\Contracts\Document;
use Illuminate\Support\Collection;

/**
 * Class CreateForm
 * @package CrCms\Document\Services\Documents
 */
class Form extends AbstractDocument implements Document
{
    protected $documentModel;

    public function __construct(Collection $fields, DocumentModel $documentModel = null)
    {
        parent::__construct($fields);
        $this->documentModel = $documentModel;
    }

    public function handle(string $role): Collection
    {
        return $this->allowFields($role)->mapWithKeys(function (AbstractField $field, string $name) {
            return [$name => $this->renderOptions($this->documentModel ? $field->setValue($this->documentModel->{$name} ?? null) : $field)];
        });
    }

    protected function renderOptions(AbstractField $field): array
    {
        return [
            'name' => $field->name(),
            'label' => $field->label(),
            'tip' => $field->tip(),
            'value' => $field->displayValue(),
            'priority' => $field->priority(),
//            'rules' => $field->rules(),
//            'roles' => $field->roles(),
//            'config' => $field->config(),
        ];
    }


}