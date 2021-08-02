<?php
namespace OpenRecipeDB\V1\Rpc\RequestAccessKey;

use Laminas\Json\Json;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;

class RequestAccessKeyController extends AbstractActionController
{
    public function requestAccessKeyAction()
    {
        return new JsonModel(['test']);
    }
}
