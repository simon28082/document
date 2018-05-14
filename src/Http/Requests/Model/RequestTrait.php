<?php

namespace CrCms\Document\Http\Requests\Model;

use Illuminate\Validation\Rule;

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
            'table_name' => ['required', new Unique($this->input('_id'))],//Rule::unique('model')->ignore($this->input('_id'))
            'status' => ['required', 'integer', 'min:1'],
            'built_fields' => ['array'],
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
            'built_fields' => trans('document::app.model.hide_fields'),
        ];
    }
}