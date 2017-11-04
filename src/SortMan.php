<?php

namespace Widi\SortIt;

use JMS\Serializer\Serializer;

/**
 * Class SortMan
 * @package Widi\SortIt
 */
class SortMan
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var SortCriteria[]
     */
    private $criterias = [];

    /**
     * SortMan constructor.
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param SortCriteria $criteria
     */
    public function registerCriteria(SortCriteria $criteria)
    {
        $this->criterias[] = $criteria;
    }

    /**
     * @param $originArray
     * @return array
     */
    public function sort($originArray): array
    {
        $workingArray = $this->buildWorkingArray($originArray);

        usort($workingArray, [$this, 'internalSort']);

        $resultArray = $this->buildResultArray($originArray, $workingArray);

        return $resultArray;
    }

    /**
     * @param $itemA
     * @param $itemB
     * @return int
     */
    private function internalSort($itemA, $itemB)
    {
        $result        = 0;
        $multiplicator = count($this->criterias) + 1;
        $factor        = count($this->criterias) * $multiplicator;

        foreach ($this->criterias as $criteria) {
            $field      = $criteria->getField();
            $sortOption = $criteria->getSortOption();
            $function   = $sortOption->getCompareFunction();

            $result += $function(
                    $this->getField($field, $itemA),
                    $this->getField($field, $itemB),
                    $sortOption
                ) * $factor;

            $factor /= $multiplicator;
        }

        return $result;
    }

    /**
     * @param string $fieldPath
     * @param array $array
     * @return mixed
     */
    private function getField(string $fieldPath, array $array)
    {
        $fields = explode('.', $fieldPath);

        $array = $array['data'];

        foreach ($fields as $field) {
            $array = $array[$field];
        }

        return $array;
    }

    /**
     * @param $originArray
     * @return array
     */
    private function buildWorkingArray($originArray): array
    {
        $tempArray = $this->serializer->toArray($originArray);

        $workingArray = [];
        foreach ($tempArray as $itemKey => $itemValue) {
            $workingArray[$itemKey]['index'] = $itemKey;
            $workingArray[$itemKey]['data']  = $itemValue;
        }
        return $workingArray;
    }

    /**
     * @param $originArray
     * @param $workingArray
     * @return array
     */
    private function buildResultArray($originArray, $workingArray): array
    {
        $resultArray = [];
        foreach ($workingArray as $workingItem) {
            $resultArray[] = $originArray[$workingItem['index']];
        }
        return $resultArray;
    }
}