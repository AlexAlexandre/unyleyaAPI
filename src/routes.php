<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    $data = array('code' => 200, 'message' => 'Welcome!');
    return $response->withJson($data);
});

$app->get('/formato', function (Request $request, Response $response, array $args) {
    $ctrl = new FormatCtrl();
    $data = $ctrl->showAll($this->db);
    return $response->withJson($data);
});