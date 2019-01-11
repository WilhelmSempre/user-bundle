<?php

namespace WilhelmSempre\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
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

        $this->createServices($container);
    }

    /**
     * @param ContainerBuilder $container
     * @return UserExtension
     */
    private function createServices(ContainerBuilder $container): self
    {
        $tokenEncoder = new Definition(TokenEncoder::class);

        $tokenEncoder
            ->setAutowired(true)
            ->setPrivate(true)
        ;

        $twoFactorAuthorization = new Definition(TwoFactorAuthorization::class);

        $twoFactorAuthorization
            ->setAutowired(true)
            ->setPrivate(true)
        ;

        $twoFactorAuthorizatiionRoleManagerFactory = new Definition(TwoFactorUserRoleManagerFactory::class);

        $twoFactorAuthorizatiionRoleManagerFactory
            ->setPrivate(true)
            ->setAutowired(true)
        ;

        $userFormAuthenticator = new Definition(UserFormAuthenticator::class);

        $userFormAuthenticator
            ->setArgument(0, new Reference('wilhelmsempre.user.two.factor.authorization.role.manager.factory'))
            ->setAutowired(true)
        ;

        $container->setDefinition('wilhelmsempre.user.token.encoder', $tokenEncoder);
        $container->setDefinition('wilhelmsempre.user.two.factor.authorization', $twoFactorAuthorization);
        $container->setDefinition('wilhelmsempre.user.two.factor.authorization.role.manager.factory', $twoFactorAuthorizatiionRoleManagerFactory);
        $container->setDefinition('wilhelmsempre.user.security.form.authenticator', $userFormAuthenticator);

        return $this;
    }
}
