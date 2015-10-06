<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;

$app = new Micro();

$app->get('/api/frameworks', function() {

    $response = new Response();
    $data = [
        'Zend',
        'Symfony',
        'Silex',
        'Phalcon',
    ];

    $response->setJsonContent($data);

    return $response;
});

$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
    echo 'The requested resource is not found';
});

$app->handle();