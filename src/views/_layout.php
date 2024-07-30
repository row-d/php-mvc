<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Page' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php if (!isset($content)): ?>
    <h1>Home</h1>
  <?php else: ?>
    <?= $content ?>
  <?php endif; ?>
</body>
</html>