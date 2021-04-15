<?php
namespace Storage\V1\Rest\Item;

class ItemResourceFactory
{
    public function __invoke($services)
    {
        return new ItemResource();
    }
}
