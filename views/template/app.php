<?php
$user = $_SESSION['auth'] ?? null;
?>

<!DOCTYPE html>
<html lang="en" data-theme="dracula">

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
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Lockbox</title>
</head>

<body class="bg-base-100 text-neutral-100">
<div class="mx-auto max-w-screen-lg h-screen flex flex-col">
  <div class="navbar bg-base-100">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">Lockbox</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li><a>Link</a></li>
        <li>
          <details>
            <summary><?= $user->name ?></summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <li><a href="/logout">Logout</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>

  <div class="flex space-x-4 w-full px-5">
    <form action="" class="flex space-x-4 w-full">
      <label class="input input-bordered flex items-center gap-2 w-full">
        <input name="search" type="text" class="grow" placeholder="Search" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
          <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
        </svg>
      </label>
      <a href="notes/create" class="btn btn-secondary">+ item</a>
    </form>
  </div>

  <div class="flex flex-grow py-6 px-5">
    <?php require "../views/{$view}.view.php"; ?>
  </div>
</div>
</body>

</html>
