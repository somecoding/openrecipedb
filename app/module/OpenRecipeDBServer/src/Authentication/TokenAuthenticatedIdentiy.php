<?php


namespace OpenRecipeDBServer\Authentication;


use Laminas\ApiTools\MvcAuth\Identity\AuthenticatedIdentity;
use Laminas\ApiTools\MvcAuth\Identity\GuestIdentity;

class TokenAuthenticatedIdentiy extends GuestIdentity
{

}