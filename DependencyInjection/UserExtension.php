<?php

namespace WilhelmSempre\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class UserExtension
 * @package WilhelmSempre\UserBundle\DependencyInjection
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class UserExtension extends Extension
{
	
    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        // ~
        
        $configFile = new FileLocator(__DIR__ . '/../Resources/config');
        
        // ~

        $loader = new YamlFileLoader($container, $configFile);
        $loader->load('services.yml');
    }
}