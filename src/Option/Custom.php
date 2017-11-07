<?php

namespace Widi\SortIt\Option;

use Closure;

/**
 * Class Custom
 * @package Widi\SortIt\Option
 */
class Custom implements SortOptionInterface
{
    /**
     * @var callable
     */
    private $compareFunction;
    /**
     * @var array
     */
    private $options;

    /**
     * SortOption constructor.
     * @param callable $compareFunction
     * @param array $options
     */
    public function __construct(callable $compareFunction, array $options = [])
    {
        $this->compareFunction = $compareFunction;
        $this->options = $options;
    }

    /**
     * @return callable
     */
    public function getCompareFunction(): callable
    {
        return $this->compareFunction;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}