<?php

namespace Widi\SortIt\Option;

/**
 * Class Descending
 * @package Widi\SortIt\Option
 */
class Descending implements SortOptionInterface
{
    /**
     * @var array
     */
    private $options;

    /**
     * AscendingSortOption constructor.
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
            if ($a>$b) {
                return -1;
            }

            if ($a<$b) {
                return 1;
            }

            return 0;
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