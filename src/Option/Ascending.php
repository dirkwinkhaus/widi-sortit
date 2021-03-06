<?php

namespace Widi\SortIt\Option;

/**
 * Class Ascending
 * @package Widi\SortIt\Option
 */
class Ascending implements SortOptionInterface
{
    /**
     * @var array
     */
    private $options;

    /**
     * Ascending constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return callable
     */
    public function getCompareFunction(): callable
    {
        return function ($a, $b) {
            return $a <=> $b;
        };
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}