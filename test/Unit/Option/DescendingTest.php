<?php

namespace Widi\SortIt\Option;

use PHPUnit\Framework\TestCase;

/**
 * Class DescendingTest
 * @package Widi\SortIt\Option
 */
class DescendingTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @test
     */
    public function itShouldCompareDesc(array $data)
    {
        $desc   = new Descending();
        $result = $desc->getCompareFunction()($data[0], $data[1]);

        $this->assertEquals($data[2], $result);
    }

    /**
     * @test
     */
    public function itShouldProvideOptions()
    {
        $desc    = new Descending(['Option']);
        $options = $desc->getOptions();

        $this->assertEquals('Option', $options[0]);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [[0, 0, 0]],
            [[1, 0, -1]],
            [[0, 1, 1]],
            [[1, 1, 0]],
        ];
    }
}