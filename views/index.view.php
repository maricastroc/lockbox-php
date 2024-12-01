<?php
$user = auth();

require '../views/partials/utils.php';
?>

<section class="w-[90vw] mx-auto flex flex-col">
  <form class="w-full flex space-x-2 mt-6 mx-auto justify-center lg:justify-start lg:mx-0" role="search" aria-label="Search">

    <div class="flex flex-col gap-8 w-full items-center justify-between">
      <div class="flex items-center gap-4">
        <?= renderUserAvatar($user) ?>
        <p class="text-neutral-400 font-mono">
          <span class="text-lg">
            <?= "hello, " . ($user ? $user->name : 'fellow') . "!" ?>
          </span>
        </p>
      </div>
      <div class="flex w-full items-center gap-2">
        <input type="text" name="search" class="w-full bg-zinc-800 rounded-xl text-md focus:outline-none p-3" value="<?= htmlspecialchars($data['search'] ?? '') ?>" placeholder="Search for any movie..." aria-label="Search movies">
        <button type="submit" aria-label="Search">
          <i class="ph ph-magnifying-glass text-[1.5rem] text-neutral-200"></i>
        </button>
      </div>
    </div>
  </form>
</section>

<main class="w-[90vw] mx-auto">
  <section class="grid gap-9 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pb-12" aria-labelledby="movies-heading">
    <h2 id="movies-heading" class="sr-only">Movies List</h2>
    <?php foreach ($data['movies'] as $movie) : ?>
      <?php require "../views/partials/_movie.php"; ?>
    <?php endforeach; ?>
  </section>
</main>