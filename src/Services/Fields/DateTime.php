<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 15:09
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use Carbon\Carbon;
use CrCms\Document\Services\Fields\Contracts\Field;

/**
 * Class DateTime
 * @package CrCms\Document\Services\Fields
 */
class DateTime extends AbstractField implements Field
{
    public function settings(): array
    {
        return [];
    }

    public function displayValue()
    {
        if ($this->value instanceof Carbon) {
            return $this->value->toDateTimeString();
        }

        return $this->value;
    }
}