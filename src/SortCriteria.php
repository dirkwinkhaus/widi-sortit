<?php

namespace Widi\SortIt;

use Widi\SortIt\Option\SortOptionInterface;

/**
 * Class SortCriteria
 * @package Widi\SortIt
 */
class SortCriteria
{
    /**
     * @var string
     */
    private $field;
    /**
     * @var SortOptionInterface
     */
    private $sortOption;

    /**
     * SortCriteria constructor.
     * @param string $field
     * @param SortOptionInterface $sortOption
     */
    public function __construct(string $field, SortOptionInterface $sortOption)
    {
        $this->field   = $field;
        $this->sortOption = $sortOption;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return SortOptionInterface
     */
    public function getSortOption(): SortOptionInterface
    {
        return $this->sortOption;
    }
}