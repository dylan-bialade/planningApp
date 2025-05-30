<?php

namespace ContainerXAU520x;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Z3chYS3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.z3chYS3' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.z3chYS3'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'repo' => ['services', 'App\\Repository\\PlanningRepository', 'getPlanningRepositoryService', true],
        ], [
            'repo' => 'App\\Repository\\PlanningRepository',
        ]);
    }
}
