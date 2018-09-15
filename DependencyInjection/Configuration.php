<?php

namespace WilhelmSempre\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package WilhelmSempre\UserBundle\DependencyInjection
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wilhelm');

        $rootNode->children()
            ->arrayNode('user');

        return $treeBuilder;
    }
}
