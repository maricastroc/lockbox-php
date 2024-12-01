<?php
$user = $_SESSION['auth'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<style>
  input:focus,
  a:focus {
    border-radius: 8px;
    outline: 1px solid #94a3b8;
    outline-offset: 0;
  }

  button:focus {
    outline: 1px solid #f5f5f5;
    outline-offset: 0;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <title>Movies DB</title>
</head>

<body class="bg-gray-950 text-neutral-100">
  <header class="sticky top-0 bg-gray-950 z-40">
    <nav class="mx-auto flex flex-col sm:flex-row justify-center sm:justify-between items-center gap-2 py-6 px-2 border-b border-gray-800 md:max-w-screen-xl w-[90vw]">
      <a href="/" class="font-mono text-xl font-bold tracking-wide text-indigo-400 border-b border-transparent hover:text-indigo-300 transition duration-200 cursor-pointer">
        movies db
      </a>
      <ul class="flex text-indigo-400">
        <?php if (auth()) : ?>
          <li class="font-mono hover:text-indigo-300 transition duration-200 ease-in-out">
            <a class="p-1" href="/my-movies">my movies</a>
          </li>
          <li class="mx-3"> | </li>
          <li class="font-mono hover:text-indigo-300 transition duration-200 ease-in-out">
            <a class="p-1" href="/register-movie">new movie</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="flex items-end justify-end gap-2 md:w-32 text-indigo-400">
        <li class="font-mono">
          <a href="/logout" class="flex items-center gap-2 hover:text-indigo-300 transition duration-200">
            <i class="ph ph-sign-in text-xl"></i>
            <?= $user ? 'logout' : 'login' ?>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="mt-2 w-full py-4 px-4 space-y-6">
    <?php require "views/{$view}.view.php"; ?>
  </main>
</body>

</html>
