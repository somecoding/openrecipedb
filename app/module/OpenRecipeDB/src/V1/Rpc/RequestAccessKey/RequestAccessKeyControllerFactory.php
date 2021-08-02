<?php
namespace OpenRecipeDB\V1\Rpc\RequestAccessKey;

class RequestAccessKeyControllerFactory
{
    public function __invoke($controllers)
    {
        return new RequestAccessKeyController();
    }
}
