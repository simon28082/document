<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018/5/7
 * Time: 16:51
 */

namespace CrCms\Document\Http\Requests\Model;

use CrCms\Document\Services\Documents\Rule;

/**
 * Trait RequestTrait
 * @package CrCms\Document\Http\Requests\Model
 */
trait RequestTrait
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:1', 'max:30'],
            'table_name' => ['required', Rule::unique('model')->ignore($this->input('_id'))],
            'status' => ['required', 'integer', 'min:0'],
            'hide_fields' => ['array'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => trans('document::app.model.name'),
            'table_name' => trans('document::app.model.table_name'),
            'status' => trans('document::app.model.status'),
            'hide_fields' => trans('document::app.model.hide_fields'),
        ];
    }
}