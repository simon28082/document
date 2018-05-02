<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:27
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Fields;

use CrCms\Document\Repositories\DocumentRepository;
use CrCms\Document\Services\Fields\Contracts\Field;
use Illuminate\Support\Str;

/**
 * Class AbstractField
 * @package CrCms\Modules\document\src\Services\Fields
 */
abstract class AbstractField implements Field
{
    const VALUE_STORE = 'store';

    const VALUE_DISPLAY = 'display';

    protected $name;

    protected $value;

    protected $rules;

    protected $label;

    protected $tip;

    protected $priority;

    protected $alias;

    protected $roles;

    protected $settings;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName(): string
    {
        return empty($this->alias) ? $this->name : $this->alias;
    }

    public function setValue($value, string $type = self::VALUE_DISPLAY)
    {
        $method = Str::studly("{$type}_value");

        $this->value = method_exists($this,$method) ?
            $this->$method($value) : $value;
        return $this;
    }

    protected function storeValue($value)
    {
        return $value;
    }

    protected function displayValue($value)
    {
        return $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setRules(array $rules): self
    {
        $this->rules = $rules;
        return $this;
    }

    public function getRules(): array
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
    public function getLabel(): string
    {
        return $this->label;
    }




    public function setTip(string $tip): self
    {
        $this->tip = $tip;
    }

    /**
     * @return string
     */
    public function getTip(): string
    {
        return $this->tip;
    }
    /**
     * @param mixed $priority
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles ?? [];
    }


    public function render(): array
    {
        return [
            'name' => $this->getName(),
            'label' => $this->label,
            'tip' => $this->tip,
            'value' => $this->value,
            'priority' => $this->priority,
            'rules' => $this->getRules(),
            'roles' => $this->getRoles(),
        ];
    }

    public function settings(): array
    {
        return [];
    }


}