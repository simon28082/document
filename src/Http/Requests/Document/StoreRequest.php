<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Requests\Document;

use CrCms\Document\Repositories\ModelRepository;
use CrCms\Document\Services\Documents\Document;
use CrCms\Document\Services\Documents\Form;
use CrCms\Document\Services\Documents\Rule;
use CrCms\Document\Services\Fields\AbstractField;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package CrCms\Document\Http\Requests\Document
 */
class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $model = $this->modelRepository()->byIntIdOrFail($this->input('model'));
        dd($model);
        $fields = $this->modelRepository()->fields($model);

        return (new Rule($fields))->handle('store');
    }


    protected function modelRepository()
    {
        return app(ModelRepository::class);
    }
}