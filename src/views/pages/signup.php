<?php
require_once MODELS_DIR . '/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION[SESSION_AUTOCOMPLETE] = $_POST;
  $user = new UserModel($_POST);
  if ($user->validate() === true) {
    // TODO: save user to database
    //$_SESSION['user'] = unique user identifier
    echo 'User saved';

  } else {
    $_SESSION[SESSION_ERRORS_KEY] = $user->errors;
  }
}
?>
<header class="container">
  <?php include_once VIEWS_DIR . '/partials/nav.php'; ?>
</header>
<main class="container">
  <h1>Sign up</h1>
  <form action="/signup" method="post">
    <?= Model::create_input("firstname", "First Name", "given-name"); ?>
    <?= Model::create_input("lastname", "Last Name", "family-name"); ?>
    <?= Model::create_input("email", "Email", "email", "email"); ?>
    <?= Model::create_input("password", "Password", "new-password", "password"); ?>
    <?= Model::create_input("password_confirmation", "Confirm Password", "new-password", "password"); ?>
    </div>
    <input type="submit" value="Sign up" style="place-self:start" />
  </form>
</main>