<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:25
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields\Contracts;

/**
 * Interface Field
 * @package CrCms\Document\Services\Fields\Contracts
 */
interface Field
{
    public function render(): array;

    public function settings(): array;
}