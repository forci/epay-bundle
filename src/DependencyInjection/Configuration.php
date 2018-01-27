<?php

/*
 * This file is part of the ForciEpayBundle package.
 *
 * Copyright (c) Forci Web Consulting Ltd.
 *
 * Author Martin Kirilov <martin@forci.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Forci\Bundle\EpayBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('forci_epay');

        $rootNode
            ->children()
                ->scalarNode('client_options')
                    ->isRequired()
                ->end()
                ->scalarNode('client_handler')
                    ->isRequired()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
