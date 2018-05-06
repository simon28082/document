<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-06 15:04
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Services\Fields\Contracts\Field;
use CrCms\User\Http\Resources\UserResource;
use CrCms\User\Models\UserModel;

/**
 * Class UserId
 * @package CrCms\Document\Services\Fields
 */
class UserId extends AbstractField implements Field
{
    public function settings(): array
    {
        return [];
    }


    public function storeValue()
    {
        return 1;
    }

    public function displayValue()
    {
//        return (new UserResource(new UserModel(['id'=>1,'name'=>'abx'])))->setIncludes([])->resolve();
        return new UserModel(['id'=>1,'name'=>'abx']);
    }


}