<?php
$hostname = $_ENV['DB_HOST'] ?? 'postgres';
$db_user = $_ENV['DB_USER'] ?? 'postgres';
$db_pass = $_ENV['DB_PASS'] ?? 'password';
$db_name = $_ENV['DB_NAME'] ?? 'test';
$connection = new PDO(sprintf('pgsql:host=%s;dbname=%s', $hostname, $db_name), $db_user, $db_pass, [PDO::ATTR_PERSISTENT => true]);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


