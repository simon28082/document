<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:39
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Services\Fields\Contracts\Field;

/**
 * Class Input
 * @package CrCms\Document\Services\Fields
 */
class Input extends AbstractField implements Field
{
    /**
     * @return array
     */
    public function settings(): array
    {
        return [
            'type' => [
                'input' => 'input',
                'textarea' => 'textarea',
            ],
            'attributes' => [
            ],
        ];
    }
}