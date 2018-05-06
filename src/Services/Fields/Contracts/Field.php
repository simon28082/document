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
    /**
     * @return array
     */
    public function settings(): array;

    /**
     * @return array
     */
    public function rules(): array;

    /**
     * @return array
     */
    public function roles(): array;

    /**
     * @return array
     */
    public function config(): array;

    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return string
     */
    public function label(): string;

    /**
     * @return string
     */
    public function tip(): string;

    /**
     * @return mixed
     */
    public function storeValue();

    /**
     * @return mixed
     */
    public function displayValue();
}