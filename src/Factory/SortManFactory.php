<?php

namespace Widi\SortIt\Factory;

use JMS\Serializer\SerializerBuilder;
use Widi\SortIt\SortMan;

/**
 * Class SortManFactory
 * @package Widi\SortIt\Factory
 */
class SortManFactory
{
    /**
     * @var SerializerBuilder
     */
    private $serializerBuilder;

    /**
     * SortManFactory constructor.
     * @param SerializerBuilder $serializerBuilder
     */
    public function __construct(SerializerBuilder $serializerBuilder)
    {
        $this->serializerBuilder = $serializerBuilder;
    }

    /**
     * @return SortMan
     */
    public function create()
    {
        $serializer = $this->serializerBuilder
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->build();

        return new SortMan($serializer);
    }
}