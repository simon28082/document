<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 16:33
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Services\Fields\Contracts\Field;

/**
 * Class PrimaryKey
 * @package CrCms\Document\Services\Fields
 */
class PrimaryKey extends AbstractField implements Field
{
    public function settings(): array
    {
        return [];
    }



}