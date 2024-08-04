<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{title}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/public/js/script.js" defer></script>
  <link rel="stylesheet" href="/public/css/pico.lime.min.css">
  <link rel="stylesheet" href="/public/css/styles.css">
  </style>
</head>

<body>
  {{ content }}
</body>

</html>
<?php
unset($_SESSION[SESSION_ERRORS_KEY]);
