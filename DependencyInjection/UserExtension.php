<?php

namespace WilhelmSempre\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use WilhelmSempre\UserBundle\Form\LoginType;
use WilhelmSempre\UserBundle\Form\TwoFactorCodeType;
use WilhelmSempre\UserBundle\Listener\TwoFactorControllerListener;
use WilhelmSempre\UserBundle\Security\UserFormAuthenticator;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorUserRoleManagerFactory;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\TwoFactorAuthorization;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Token\Encoder\TokenEncoder;
use Symfony\Component\DependencyInjection\Definition;

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
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        $container
            ->setParameter( 'wilhelmsempre.user.redirect_after_authorization_route',
                $config['redirect_after_authorization_route'])
        ;

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
