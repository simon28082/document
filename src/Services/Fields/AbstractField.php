<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:27
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Services\Fields\Contracts\Field;
use Illuminate\Support\Str;

/**
 * Class AbstractField
 * @package CrCms\Modules\document\src\Services\Fields
 */
abstract class AbstractField implements Field
{
//    const VALUE_STORE = 'store';
//
//    const VALUE_DISPLAY = 'display';

    protected $name;

    protected $value;

    protected $rules;

    protected $label;

    protected $tip;

    protected $priority;

    protected $alias;

    protected $roles;

    protected $config;

    protected $attributes;

    protected $original = [];

    public function __construct(array $attributes, array $data = [])
    {
        $this->attributes = $attributes;
        $this->original = $data;
        $this->setAttributesValue( $attributes,$data);

    }


    protected function setAttributesValue(array $attributes,array $data): void
    {
        $attributes['value'] = $data[$attributes['name']] ?? null;
        foreach ($attributes as $attribute => $value) {
            $method = Str::studly("set_{$attribute}");
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function name(): string
    {
        return empty($this->alias) ? $this->name : $this->alias;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function storeValue()
    {
        return $this->value ?? null;
    }

    public function displayValue()
    {
        return $this->value ?? null;
    }

    public function setRules(array $rules): self
    {
        $this->rules = $rules;
        return $this;
    }

    public function rules(): array
    {
        return $this->rules ?? [];
    }


    /**
     * @param string $label
     * @return AbstractField
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function label(): string
    {
        return $this->label ?? '';
    }


    public function setTip(string $tip): self
    {
        $this->tip = $tip;
    }

    /**
     * @return string
     */
    public function tip(): string
    {
        return $this->tip ?? '';
    }

    /**
     * @param mixed $priority
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
    }

    public function priority(): int
    {
        return $this->priority ?? 0;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function roles(): array
    {
        return $this->roles ?? [];
    }

//    public function render(): array
//    {
//        return [
//            'name' => $this->name(),
//            'label' => $this->label(),
//            'tip' => $this->tip(),
//            'value' => $this->value(),
//            'priority' => $this->priority(),
//            'rules' => $this->rules(),
//            'roles' => $this->roles(),
//            'config' => $this->config(),
//        ];
//    }

    public function config(): array
    {
        return $this->config ?? [];
    }

    protected function setConfig(array $config): self
    {
        $this->config = $config;
        return $this;
    }
}