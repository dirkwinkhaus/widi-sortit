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
     * @return SortMan
     */
    public function __invoke()
    {
        $serializerBuilder = new SerializerBuilder();

        $serializer = $serializerBuilder
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->build();

        return new SortMan($serializer);
    }

    /**
     * @return SortMan
     */
    public function create()
    {
        return $this->__invoke();
    }
}