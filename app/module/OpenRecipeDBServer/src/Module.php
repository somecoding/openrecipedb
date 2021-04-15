<?php

namespace OpenRecipeDBServer;

use Exception;
use Laminas\Console\Adapter\AdapterInterface;
use Laminas\EventManager\EventInterface;
use Laminas\Http\Request;
use Laminas\ModuleManager\Feature\AutoloaderProviderInterface;
use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Laminas\ModuleManager\Feature\DependencyIndicatorInterface;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Locale;
use OpenRecipeDBServer\EventSubscriber\OAuth2AggregateListener;
use Traversable;
use ZendTwig\View\TwigModel;

/**
 * Class Module
 * @package Techfile
 */
class Module implements
    DependencyIndicatorInterface,
    BootstrapListenerInterface,
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ConsoleUsageProviderInterface
{
    /**
     * @return array|mixed|Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @param EventInterface $e
     * @return array|void
     */
    public function onBootstrap(EventInterface $e)
    {
//
//        $doctrineOAuth2Adapter = $e->getParam('application')
//            ->getServiceManager()
//            ->get('oauth2.doctrineadapter.default')
//        ;
//        $listenerAggregate = new OAuth2AggregateListener();
//        $doctrineOAuth2Adapter->getEventManager()->attachAggregate($listenerAggregate);
    }



    /**
     * @return array
     */
    public function getModuleDependencies()
    {
        return [
            'Reinfi\DependencyInjection',
            'DoctrineORMModule',
        ];
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Laminas\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            // Describe available commands
            'addUser USERNAME'       => 'Add a user to the system',
            // Describe expected parameters
            ['USERNAME', 'The plain  login name of the user without "\ADDS" in front'],
            'generateData'           => 'Import Data into project after DB was cleared',
            'setAdmin <userName>'    => 'promotes a user to admin',
            'removeAdmin <userName>' => 'removes admin rights from user',
        ];
    }
}
