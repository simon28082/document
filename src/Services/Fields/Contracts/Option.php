<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-05 11:07
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields\Contracts;

/**
 * Interface Option
 * @package CrCms\Document\Services\Fields\Contracts
 */
interface Option
{
    /**
     * @return array
     */
    public function options(): array;
}