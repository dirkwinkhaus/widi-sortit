<?php

namespace Widi\SortIt\Option;

use PHPUnit\Framework\TestCase;

/**
 * Class AscendingTest
 * @package Widi\SortIt\Option
 */
class AscendingTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @test
     */
    public function itShouldCompareAsc(array $data)
    {
        $asc    = new Ascending();
        $result = $asc->getCompareFunction()($data[0], $data[1]);

        $this->assertEquals($data[2], $result);
    }

    /**
     * @test
     */
    public function itShouldProvideOptions()
    {
        $asc     = new Ascending(['Option']);
        $options = $asc->getOptions();

        $this->assertEquals('Option', $options[0]);
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
}