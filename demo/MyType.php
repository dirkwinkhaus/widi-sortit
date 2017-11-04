<?php

namespace Widi\SortIt;

/**
 * Class MyType
 * @package Widi\SortIt
 */
class MyType
{
    /**
     * @var string
     */
    private $name;

    /**
     * MyType constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}