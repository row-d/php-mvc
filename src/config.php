<?php
declare(strict_types=1);
define('LOG_DIR', __DIR__ . '/logs');
define('VIEWS_DIR', __DIR__ . '/views');
define('LAYOUTS_DIR', __DIR__ . '/views/layouts');
define('PAGES_DIR', __DIR__ . '/views/pages');
define('PUBLIC_DIR', __DIR__ . '/public');
define('UTILS_DIR', __DIR__ . '/utils');
define('API_DIR', __DIR__ . '/api');
define('MODELS_DIR', __DIR__ . '/models');
define('CONTROLLERS_DIR', __DIR__ . '/controllers');

set_exception_handler(function (Throwable $throwable) {
  $logFile = LOG_DIR . '/error.log';
  $message = date('Y-m-d H:i:s') . ' - Error: ' . $throwable->getMessage() . ' in ' . $throwable->getFile() . ' on line ' . $throwable->getLine() . PHP_EOL;
  file_put_contents($logFile, $message, FILE_APPEND);
});

session_start();
define("SESSION_ERRORS_KEY", 'errors');
define("SESSION_AUTOCOMPLETE", 'autocomplete');