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

class TestPaymentReceiveCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
            ->setName('forci_epay:test:receive')
            ->setDescription('Test ePay');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $container = $this->getContainer();

        $client = $container->get('forci_epay.client');

        $data = <<<DATA
INVOICE=1:STATUS=PAID:PAY_TIME=20150819185346:STAN=123123:BCODE=123123
INVOICE=2:STATUS=PAID:PAY_TIME=20150819185346:STAN=123123:BCODE=123123
DATA;
        $encoded = base64_encode($data);

        $post = [
            'checksum' => $client->hmac($encoded, $client->getMerchantSecret()),
            'encoded' => $encoded
        ];

        $response = $client->receiveResponse($post);
        $output->writeln($response->toString());
    }
}
