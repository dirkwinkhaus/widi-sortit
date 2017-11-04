<?php

namespace Widi\SortIt\Option;

/**
 * Class SortOption
 * @package Widi\SortIt
 */
interface SortOptionInterface
{
    /**
     * @return callable
     */
    public function getCompareFunction(): callable;

    /**
     * @return array
     */
    public function getOptions(): array;
}