<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 19:22
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Attributes;

use CrCms\AttributeContract\AbstractAttributeContract;

/**
 * Class DocumentAttribute
 * @package CrCms\Document\Attributes
 */
class DocumentAttribute extends AbstractAttributeContract
{
    const ROLE_LIST = 'list';

    const ROLE_CREATE = 'create';

    const ROLE_STORE = 'store';

    const ROLE_EDIT = 'edit';

    const ROLE_UPDATE = 'update';

    const ROLE_SEARCH = 'search';

    const ROLE_STORE_RULE = 'store_rule';

    const ROLE_UPDATE_RULE = 'update_rule';

    const ROLE_SINGLE = 'single';

    const KEY_ROLE = 'role';

    /**
     *
     */
    const STATUS_ENABLE = 1;

    /**
     *
     */
    const STATUS_HIDDEN = 2;

    /**
     *
     */
    const STATUS_DISABLE = 3;

    /**
     *
     */
    const KEY_STATUS = 'status';


    protected function attributes(): array
    {
        return [
            static::KEY_ROLE => [
                static::ROLE_LIST => trans('document::app.role.list'),
                static::ROLE_CREATE => trans('document::app.role.create'),
                static::ROLE_STORE => trans('document::app.role.store'),
                static::ROLE_EDIT => trans('document::app.role.edit'),
                static::ROLE_UPDATE => trans('document::app.role.update'),
                static::ROLE_SEARCH => trans('document::app.role.search'),
                static::ROLE_STORE_RULE => trans('document::app.role.store_rule'),
                static::ROLE_UPDATE_RULE => trans('document::app.role.update_rule'),
                static::ROLE_SINGLE => trans('document::app.role.single'),
            ],

            static::KEY_STATUS => [
                static::STATUS_ENABLE =>  trans('document::app.status.enable'),
                static::STATUS_HIDDEN =>  trans('document::app.status.hidden'),
                static::STATUS_DISABLE =>  trans('document::app.status.disable')
            ]
        ];
    }

}