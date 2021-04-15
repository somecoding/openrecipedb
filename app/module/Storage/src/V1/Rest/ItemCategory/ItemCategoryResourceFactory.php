<?php
namespace Storage\V1\Rest\ItemCategory;

class ItemCategoryResourceFactory
{
    public function __invoke($services)
    {
        return new ItemCategoryResource();
    }
}
