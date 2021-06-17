<?php
namespace Recipe\V1\Rest\Ingredient;

class IngredientResourceFactory
{
    public function __invoke($services)
    {
        return new IngredientResource();
    }
}
