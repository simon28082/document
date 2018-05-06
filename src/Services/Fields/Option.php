<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-05 11:09
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Services\Fields\Contracts\Field;
//use CrCms\Document\Services\Fields\Contracts\Option as OptionContract;

/**
 * Class Option
 * @package CrCms\Document\Services\Fields
 */
class Option extends AbstractField implements Field
{
//    /**
//     * @var array
//     */
//    protected $options;
//
//    /**
//     * @param array $options
//     * @return Option
//     */
//    protected function setOptions(array $options): self
//    {
//        $this->options = $options;
//        return $this;
//    }
//
//    /**
//     * @return array
//     */
//    public function options(): array
//    {
//        return $this->options;
//    }

    /**
     * @return array
     */
    public function settings(): array
    {
        return [
            'type' => [
                'radio' => 'radio',
                'checkbox' => 'checkbox',
                'select' => 'select'
            ],
            'multiple' => [
                'y' => 'Y',
                'n' => 'N'
            ],
            'attributes' => [
            ],
            'options' => [
                1 => 'option1',
                2 => 'option2',
            ],
        ];
    }


}