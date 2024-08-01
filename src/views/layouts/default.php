<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Page' ?></title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <style type="text/tailwindcss">
    input{
      @apply dark:bg-black dark:text-white;
    }
  </style>
</head>


<body class="container mx-auto dark:bg-black dark:text-white">
  <header>
    <nav class="flex justify-between py-6">
      <a href="/">Home</a>
      <ul>
        <li><a href="/cats" class="underline"> Cats</a></li>
      </ul>
    </nav>
  </header>
  {{ content }}
</body>

</html>