# REQUESTER
Este é um componente PHP criado para estudo de requisições utilizando a biblioteca CURL com PHP e também para estudo de criação de componentes PHP.

## Instalação
> composer require ernandesrs/requester

## Utilização
```php
<?php

use ErnandesRS\Requester\Requester;

require __DIR__ . "/../../vendor/autoload.php";

/**
 * 
 * API UTILIZADA
 * https://jsonplaceholder.typicode.com/guide/
 * 
 */

/**
 * Requisição GET
 * Buscando um post
 */
echo "\n\Obter post\n";
print_r(Requester::get("https://jsonplaceholder.typicode.com/posts/1"));

/**
 * Requisição POST
 * Criando um post
 */
$body = json_encode([
    "title" => "Título top",
    "body" => "Corpo massa deste post de título maneiro",
    "userId" => 1
]);

$headers = [
    'Content-type: application/json; charset=UTF-8',
];

echo "\n\nCriar post\n";
print_r(Requester::post("https://jsonplaceholder.typicode.com/posts", $body, $headers));

/**
 * Requisição PUT
 * Atualizando um post
 */
$body = json_encode([
    "id" => 1,
    "title" => "Novo título",
    "body" => "Opa, conteúdo do post atualizado",
    "userId" => 1
]);

$headers = [
    'Content-type: application/json; charset=UTF-8',
];

echo "\n\nAtualizar post\n";
print_r(Requester::put("https://jsonplaceholder.typicode.com/posts/1", $body, $headers));

/**
 * Requisição PATCH
 * Atualizando parcialmente um post
 */
$body = json_encode([
    "body" => "Opa, conteúdo do post atualizado parcialmente"
]);

$headers = [
    'Content-type: application/json; charset=UTF-8',
];

echo "\n\nAtualizar parcialmente post\n";
print_r(Requester::patch("https://jsonplaceholder.typicode.com/posts/1", $body, $headers));

/**
 * Requisição DELETE
 * Deletando um post
 */
echo "\n\nDeletar post\n";
print_r(Requester::delete("https://jsonplaceholder.typicode.com/posts/1"));
```

## Requisitos
    PHP 8 ou superior.