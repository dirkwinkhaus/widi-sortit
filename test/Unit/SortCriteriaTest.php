<?php

namespace Widi\SortIt;

use PHPUnit\Framework\TestCase;
use Widi\SortIt\Option\SortOptionInterface;

class SortCriteriaTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldProvideFieldAndOptions()
    {
        $sortOption = $this->prophesize(SortOptionInterface::class)->reveal();
        $criteria   = new SortCriteria('field', $sortOption);

        $this->assertSame($sortOption, $criteria->getSortOption());
        $this->assertEquals('field', $criteria->getField());
    }
}