<?php
require_once UTILS_DIR . '/auth/authenticated.php';
require_once FRAMEWORK_DIR . '/redirect.php';

if (!is_authenticated()) {
  redirect('/');
}

require_once '/_layout.php';

