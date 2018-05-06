<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 19:28
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents;

use CrCms\Document\Attributes\DocumentAttribute;
use Illuminate\Support\Collection;
use CrCms\Document\Services\Documents\Contracts\Document;

/**
 * Class Factory
 * @package CrCms\Document\Services\Documents
 */
class DocumentFactory
{
    /**
     * @var array
     */
    protected static $mapping = [
        DocumentAttribute::ROLE_LIST => Many::class,
        DocumentAttribute::ROLE_CREATE => Form::class,
        DocumentAttribute::ROLE_EDIT => Form::class,
        DocumentAttribute::ROLE_SEARCH => Form::class,
        DocumentAttribute::ROLE_STORE => Store::class,
        DocumentAttribute::ROLE_UPDATE => Store::class,
        DocumentAttribute::ROLE_STORE_RULE => Rule::class,
        DocumentAttribute::ROLE_UPDATE_RULE => Rule::class,
        DocumentAttribute::ROLE_SINGLE => Single::class
    ];

    /**
     * @param string $role
     * @param Collection $fields
     * @return Document
     */
    public static function factory(string $role, Collection $fields): Document
    {
        return func_num_args() <= 2 ? (new static::$mapping[$role]($fields)) : new static::$mapping[$role]($fields, ...array_slice(func_get_args(), 2));
    }

    /**
     * @param string $role
     * @param Collection $fields
     * @return array|Collection
     */
    public static function handle(string $role, Collection $fields)
    {
        return static::factory($role, $fields, ...array_slice(func_get_args(), 2))->handle($role);
    }
}