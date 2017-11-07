<?php

namespace Widi\SortIt\Factory;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Widi\SortIt\SortMan;

/**
 * Class SortManFactoryTest
 * @package Widi\SortIt\Factory
 */
class SortManFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCreateTheSortMan()
    {
        $serializer = $this->prophesize(Serializer::class);

        $serializerBuilder = $this->prophesize(SerializerBuilder::class);
        $serializerBuilder->addDefaultHandlers()->willReturn($serializerBuilder);
        $serializerBuilder->addDefaultListeners()->willReturn($serializerBuilder);
        $serializerBuilder->build()->willReturn($serializer->reveal());


        $sortManFactory    = new SortManFactory($serializerBuilder->reveal());
        $instance          = $sortManFactory->create();

        $this->assertInstanceOf(SortMan::class, $instance);
    }
}