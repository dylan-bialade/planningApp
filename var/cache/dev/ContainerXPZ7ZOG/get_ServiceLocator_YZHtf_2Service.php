<?php

namespace ContainerXPZ7ZOG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_YZHtf_2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.yZHtf.2' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.yZHtf.2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'personnel' => ['privates', '.errored..service_locator.yZHtf.2.App\\Entity\\Personnel', NULL, 'Cannot autowire service ".service_locator.yZHtf.2": it needs an instance of "App\\Entity\\Personnel" but this type has been excluded in "config/services.yaml".'],
        ], [
            'personnel' => 'App\\Entity\\Personnel',
        ]);
    }
}
