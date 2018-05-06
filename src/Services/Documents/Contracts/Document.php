<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:25
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents\Contracts;

/**
 * Interface Document
 * @package CrCms\Document\Services\Documents\Contracts
 */
interface Document
{
    public function handle(string $role);
}