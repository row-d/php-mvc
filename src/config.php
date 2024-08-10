<?php
declare(strict_types=1);
define('API_DIR', __DIR__ . '/api');
define('CONTROLLERS_DIR', __DIR__ . '/controllers');
define('FRAMEWORK_DIR', __DIR__ . '/framework');
define('LAYOUTS_DIR', __DIR__ . '/views/layouts');
define('LOG_DIR', __DIR__ . '/logs');
define('MODELS_DIR', __DIR__ . '/models');
define('PAGES_DIR', __DIR__ . '/views/pages');
define('PUBLIC_DIR', __DIR__ . '/public');
define('UTILS_DIR', __DIR__ . '/utils');
define('VIEWS_DIR', __DIR__ . '/views');
define("SESSION_AUTOCOMPLETE", 'autocomplete');
define("SESSION_ERRORS_KEY", 'errors');

set_exception_handler(function (Throwable $throwable) {
  $logFile = LOG_DIR . '/error.log';
  $message = date('Y-m-d H:i:s') . ' - Error: ' . $throwable->getMessage() . ' in ' . $throwable->getFile() . ' on line ' . $throwable->getLine() . PHP_EOL;
  file_put_contents($logFile, $message, FILE_APPEND);
});

session_start();