<?php

namespace Widi\SortIt\Option;

use PHPUnit\Framework\TestCase;
use \Exception;

/**
 * Class CustomTest
 * @package Widi\SortIt\Option
 */
class CustomTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @test
     */
    public function itShouldCompare(array $data)
    {
        $custom = new Custom([$this, 'compare']);
        $result = $custom->getCompareFunction()($data[0], $data[1]);

        $this->assertEquals($data[2], $result);
    }

    /**
     * @test
     */
    public function itShouldProvideOptions()
    {
        $custom  = new Custom([$this, 'compare'], ['Options']);
        $options = $custom->getOptions();

        $this->assertEquals('Options', $options[0]);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [[0, 0, 0]],
            [[1, 0, 1]],
            [[0, 1, -1]],
            [[1, 1, 0]],
        ];
    }

    /**
     * @param $a
     * @param $b
     * @param array $options
     * @return int
     * @throws Exception
     */
    public function compare($a, $b): int
    {
        return $a <=> $b;
    }
}