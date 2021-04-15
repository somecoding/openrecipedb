<?php
namespace Storage\V1\Rest\ItemDefinition;

class ItemDefinitionResourceFactory
{
    public function __invoke($services)
    {
        return new ItemDefinitionResource();
    }
}
