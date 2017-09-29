<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);


/**
 * Auth básica do JWT
 * Whitelist - Bloqueia tudo, e só libera os
 * itens dentro do "passthrough"
 */
$app->add(new \Slim\Middleware\JwtAuthentication([
    "regexp" => "/(.*)/", //Regex para encontrar o Token nos Headers - Livre
    "header" => "X-Token", //O Header que vai conter o token
    "path" => "/", //Vamos cobrir toda a API a partir do /
    "passthrough" => ["/auth"], //Vamos adicionar a exceção de cobertura a rota /auth
    "realm" => "Protected",
    "secret" => 'secretKEY' //Nosso secretkey criado
]));