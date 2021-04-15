<?php
namespace OpenRecipeDB\V1\Rest\AccessKey;

class AccessKeyResourceFactory
{
    public function __invoke($services)
    {
        return new AccessKeyResource();
    }
}
