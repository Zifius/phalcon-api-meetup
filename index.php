<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;

$app = new Micro();

$app->get('/api/frameworks', function() {

    $response = new Response();
    $data = [
        ['name' => 'Zend', 'version' => '2.4.8'],
        ['name' => 'Symfony', 'version' => '2.7.5'],
        ['name' => 'Silex', 'version' => '1.3.4'],
        ['name' => 'Phalcon', 'version' => '2.0.8']
    ];

    $response->setJsonContent($data);

    return $response;
});

$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
    echo 'The requested resource is not found';
});

$app->handle();