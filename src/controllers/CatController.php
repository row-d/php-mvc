<?php

require_once __DIR__ . '/../services/CatService.php';
function CatController(string $method, ?array $body, ?array $query)
{
  echo json_encode(match ($method) {
    'GET' => match (array_key_exists('name', $query)) {
        true => CatService::getCat($query['name']),
        false => CatService::getCats(),
      },
    'POST' => CatService::addCat($body),
  });
}