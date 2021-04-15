<?php


namespace OpenRecipeDBServer\EventSubscriber;


use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\Event;
use Laminas\EventManager\EventManagerInterface;

class OAuth2AggregateListener extends AbstractListenerAggregate
{
    protected $handlers = array();
    protected $logInAs;

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->handlers[] = $events->attach('checkUserCredentials', array($this, 'checkUserCredentials'));
    }

    /**
     * Do work such as non-standard encrypted password checking
     */
    public function checkUserCredentials(Event $e)
    {//TODO
        if ($e->getParams()['username'] == 'specialUser') {
            $e->stopPropagation();

            return true;
        }
        return false;
    }
}