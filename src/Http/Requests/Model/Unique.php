<?php

namespace CrCms\Document\Http\Requests\Model;

use CrCms\Document\Models\Model;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

/**
 * Class Unique
 * @package CrCms\Document\Http\Requests\Model
 */
class Unique implements Rule
{
    /**
     * @var string null
     */
    protected $id;

    /**
     * Unique constructor.
     * @param null $id
     */
    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return !(bool)Model::where($attribute, $value)->where('_id', '!=', (string)$this->id)->first();
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return trans('document::app.model.table_name');
    }
}