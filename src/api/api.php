<?php

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$body = match ($_SERVER['CONTENT_TYPE']) {
  'application/json' => json_decode(file_get_contents('php://input'), true),
  default => $_POST,
};
$queryParams = $_REQUEST;
