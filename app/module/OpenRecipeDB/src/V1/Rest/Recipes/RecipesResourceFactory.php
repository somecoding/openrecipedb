<?php
namespace OpenRecipeDB\V1\Rest\Recipes;

class RecipesResourceFactory
{
    public function __invoke($services)
    {
        return new RecipesResource();
    }
}
