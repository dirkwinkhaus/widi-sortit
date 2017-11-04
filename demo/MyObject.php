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
     * MyObject constructor.
     * @param int $value
     * @param string $label
     * @param MyType $type
     */
    public function __construct(int $value, string $label, MyType $type)
    {
        $this->value = $value;
        $this->label = $label;
        $this->type  = $type;
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