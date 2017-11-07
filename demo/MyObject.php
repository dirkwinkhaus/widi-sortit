<?php

namespace Widi\SortIt;

/**
 * Class MyObject
 * @package Widi\SortIt
 */
class MyObject
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $label;

    /**
     * @var MyType
     */
    private $type;
    /**
     * @var string
     */
    private $name;

    /**
     * MyObject constructor.
     * @param string $name
     * @param int $value
     * @param string $label
     * @param MyType $type
     */
    public function __construct(string $name, int $value, string $label, MyType $type)
    {
        $this->value = $value;
        $this->label = $label;
        $this->type  = $type;
        $this->name  = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return MyType
     */
    public function getType(): MyType
    {
        return $this->type;
    }
}