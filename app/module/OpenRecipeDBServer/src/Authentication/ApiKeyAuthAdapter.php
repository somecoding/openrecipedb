<?php


namespace OpenRecipeDBServer\Authentication;


use Laminas\ApiTools\MvcAuth\Authentication\AbstractAdapter;
use Laminas\ApiTools\MvcAuth\Identity\IdentityInterface;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Laminas\Http\Request;
use Laminas\Http\Response;

class ApiKeyAuthAdapter extends AbstractAdapter
{

    protected $authorizationTokenTypes = ['bearer', 'basic', 'digest'];
    public function provides()
    {
       return ['api-token'];
    }

    public function matches($type)
    {
        return in_array($type, $this->provides(), true);
    }

    public function preAuth(Request $request, Response $response)
    {
        return;
        // TODO: Implement preAuth() method.
    }

    public function authenticate(Request $request, Response $response, MvcAuthEvent $mvcAuthEvent)
    {
        // TODO: Implement authenticate() method.
        $identity = new TokenAuthenticatedIdentiy();
        return new TokenIdentity($identity);
    }

    /**
     * Determine if the given request is a type (oauth2) that we recognize
     *
     * @return false|string
     */
    public function getTypeFromRequest(Request $request)
    {
        $type = parent::getTypeFromRequest($request);

        if (false !== $type) {
            return 'oauth2';
        }

        if (
            ! in_array($request->getMethod(), $this->requestsWithoutBodies)
            && $request->getHeaders()->has('Content-Type')
            && $request->getHeaders()->get('Content-Type')->match('application/x-www-form-urlencoded')
            && $request->getPost('access_token')
        ) {
            return 'oauth2';
        }

        if (null !== $request->getQuery('access_token')) {
            return 'oauth2';
        }

        return false;
    }
}