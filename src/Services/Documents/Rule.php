<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 14:10
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Services\Documents\Contracts\Document;
use CrCms\Document\Services\Fields\AbstractField;

/**
 * Class Rule
 * @package CrCms\Document\Services\Documents
 */
class Rule extends AbstractDocument implements Document
{
    public function handle(string $role)
    {
        return $this->allowFields($role)->mapWithKeys(function(AbstractField $field, string $name){
            return [$name => $field->rules()];
        })->toArray();
    }

}