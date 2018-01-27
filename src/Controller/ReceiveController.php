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

namespace Forci\Bundle\EpayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiveController extends Controller {

    public function receiveAction(Request $request) {
        $client = $this->container->get('forci_epay.client');
        $post = $request->request->all();
        $response = $client->receiveResponse($post);

        return new Response($response->toString());
    }
}
