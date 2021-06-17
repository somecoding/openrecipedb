<?php
namespace Recipe\V1\Rest\Recipe;

class RecipeResourceFactory
{
    public function __invoke($services)
    {
        return new RecipeResource();
    }
}
