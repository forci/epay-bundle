<?php

/*
 * This file is part of the ForciEpayBundle package.
 *
 * (c) Martin Kirilov <wucdbm@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Forci\Bundle\EpayBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetReceivePathCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
            ->setName('forci_epay:get_receive_path')
            ->setDescription('Get the current receive address');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $container = $this->getContainer();

        $router = $container->get('router');

        $url = $router->generate('forci_epay_receive');

        $output->writeln(sprintf('<info>%s</info>', $url));
    }
}
