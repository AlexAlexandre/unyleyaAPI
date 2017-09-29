<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    $data = array('code' => 200, 'message' => 'Welcome!');
    return $response->withJson($data);
});


$app->post('/auth', function (Request $request, Response $response) use ($app){
    $key = 'secretKEY';
    $body = $request->getParsedBody();
    $user = UserCtrl::signIn($this->db, $body);

    if($user === true )
    {
        $token = array(
            "user" => $body['tx_nme_user'],
            "psw" => $body['tx_psw_user'],
        );

        $jwt = JWT::encode($token, $key);

        return $response->withJson(["auth-jwt" => $jwt], 200)
            ->withHeader('Content-type', 'application/json');
    }
    else
    {
        return $response->withJson(["msg" => "User not found"], 401);
    }

});

/***********************************************
 *                                              *
 * ROTAS DE ACESSO PARA A ENTIDADE USUARIO      *
 *                                              *
 ***********************************************/


$app->map(['GET', 'POST', 'PUT', 'DELETE'], '/usuario[/{id}]', function ($request, $response, $args) {
    $method = $request->getMethod();

    switch ($method)
    {
        case 'GET':
            if(empty($args))
            {
                $data = UserCtrl::showAll($this->db);
                return $response->withJson($data);
            }
            else
            {
                $data = UserCtrl::find($this->db, $args['id']);
                return $response->withJson($data);
            }
            break;
        case 'POST':
            $parsedBody = $request->getParsedBody();
            $data = UserCtrl::create($this->db, $parsedBody);
            return $response->withJson($data);
            break;
        case 'PUT':
            $parsedBody = $request->getParsedBody();
            $data = UserCtrl::update($this->db, $parsedBody, $args['id']);
            return $response->withJson($data);
            break;
        case 'DELETE':
            $data = UserCtrl::destroy($this->db, $args['id']);
            return $response->withJson($data);
            break;
    }

});


/***********************************************
*                                              *
* ROTAS DE ACESSO PARA A ENTIDADE FORMATO      *
*                                              *
***********************************************/


$app->map(['GET', 'POST', 'PUT', 'DELETE'], '/formato[/{id}]', function ($request, $response, $args) {
    $method = $request->getMethod();

    switch ($method)
    {
        case 'GET':
                if(empty($args))
                {
                    $data = FormatCtrl::showAll($this->db);
                    return $response->withJson($data);
                }
                else
                {
                    $data = FormatCtrl::find($this->db, $args['id']);
                    return $response->withJson($data);
                }
        break;
        case 'POST':
                $parsedBody = $request->getParsedBody();
                $data = FormatCtrl::create($this->db, $parsedBody);
                return $response->withJson($data);
        break;
        case 'PUT':
                $parsedBody = $request->getParsedBody();
                $data = FormatCtrl::update($this->db, $parsedBody, $args['id']);
                return $response->withJson($data);
        break;
        case 'DELETE':
            $data = FormatCtrl::destroy($this->db, $args['id']);
            return $response->withJson($data);
        break;
    }

});


/***********************************************
*                                              *
* ROTAS DE ACESSO PARA A ENTIDADE COR          *
*                                              *
 ***********************************************/


$app->map(['GET', 'POST', 'PUT', 'DELETE'], '/cor[/{id}]', function ($request, $response, $args) {
    $method = $request->getMethod();

    switch ($method)
    {
        case 'GET':
            if(empty($args))
            {
                $data = ColorListCtrl::showAll($this->db);
                return $response->withJson($data);
            }
            else
            {
                $data = ColorListCtrl::find($this->db, $args['id']);
                return $response->withJson($data);
            }
            break;
        case 'POST':
            $parsedBody = $request->getParsedBody();
            $data = ColorListCtrl::create($this->db, $parsedBody);
            return $response->withJson($data);
            break;
        case 'PUT':
            $parsedBody = $request->getParsedBody();
            $data = ColorListCtrl::update($this->db, $parsedBody, $args['id']);
            return $response->withJson($data);
            break;
        case 'DELETE':
            $data = ColorListCtrl::destroy($this->db, $args['id']);
            return $response->withJson($data);
            break;
    }

});


/***********************************************
*                                              *
* ROTAS DE ACESSO PARA A ENTIDADE MESA         *
*                                              *
 ***********************************************/


$app->map(['GET', 'POST', 'PUT', 'DELETE'], '/mesa[/{id}]', function ($request, $response, $args) {
    $method = $request->getMethod();

    switch ($method)
    {
        case 'GET':
            if(empty($args))
            {
                $data = TableCtrl::showAll($this->db);
                return $response->withJson($data);
            }
            else
            {
                $data = TableCtrl::find($this->db, $args['id']);
                return $response->withJson($data);
            }
            break;
        case 'POST':
            $parsedBody = $request->getParsedBody();
            $data = TableCtrl::create($this->db, $parsedBody);
            return $response->withJson($data);
            break;
        case 'PUT':
            $parsedBody = $request->getParsedBody();
            $data = TableCtrl::update($this->db, $parsedBody, $args['id']);
            return $response->withJson($data);
            break;
        case 'DELETE':
            $data = TableCtrl::destroy($this->db, $args['id']);
            return $response->withJson($data);
            break;
    }

});