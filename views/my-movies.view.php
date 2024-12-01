<?php
$message = flash()->get('message');
?>

<?php if (!empty($message)) : ?>
  <div class="w-auto items-center text-center">
    <h2 class="mb-10 text-md text-indigo-500 font-mono">
      <?= $message ?>
    </h2>
  </div>
<?php endif; ?>
<?php if (count($data['my-movies']) > 0) : ?>
  <section class="md:max-w-screen-xl w-[90vw] mx-auto grid gap-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pb-12">
    <?php foreach ($data['my-movies'] as $movie) : ?>

      <div class="w-full p-6 bg-zinc-800 rounded-md bg-neutral-900 text-neutral-300">
        <div class="flex flex-col">
          <div class="flex flex-col gap-4 min-[400px]:flex-row max-[400px]:items-center">
            <?php if ($movie->cover_url != null) : ?>
              <img src="<?= $movie->cover_url ?>" alt="<?= $movie->title ?>" class="rounded w-36 h-auto opacity-80">
            <?php else : ?>
              <img src="data/images/poster-not-found.jpg" alt="<?= $movie->title ?>" class="rounded w-36 h-auto opacity-80">
            <?php endif; ?>
            <div class="h-auto flex flex-col justify-between w-full max-[400px]:text-center">
              <div>
                <a href="/movie?id=<?= $movie->id ?>" class="line-clamp-3 font-mono hover:text-neutral-100 transition duration-200 font-semibold text-sm">
                  <?= $movie->title ?> (<?= $movie->release_year ?>)
                </a>
                <div class="text-xs italic my-2">
                  <?= $movie->director ?>
                </div>
                <?php if ($movie->getAverageRating() > 0) : ?>
                  <div class="text-xs">
                    <?php for ($i = 0; $i < $movie->getAverageRating(); $i++) : ?>
                      <i class="ph ph-star text-lg"></i>
                    <?php endfor; ?>
                  </div>
                <?php else : ?>
                  <p class="text-neutral-200 font-mono mb-2 text-xs">
                    <?= 'No ratings available.' ?>
                  </p>
                <?php endif; ?>
              </div>

              <section class="text-xs font-mono max-[400px]:mt-6">
                <?= $movie->synopsis ?>
              </section>
            </div>
          </div>
        </div>
        <button onclick="window.location.href='/movie?id=<?= $movie->id ?>'" class="hover:bg-indigo-600 transition duration-200 mt-4 py-2 rounded-lg w-full bg-neutral-900 text-neutral-300 items-center justify-center font-mono text-sm text-center">
          View Movie
        </button>
      </div>
    <?php endforeach; ?>
  </section>
<?php else : ?>
  <div class="flex flex-col mx-auto text-center w-full gap-3">
    <h2 class="font-mono text-center text-neutral-100 text-md">No movies available.</h2>
    <a href="/register-movie" class="font-mono text-indigo-500 hover:text-indigo-300 transition duration-200">Click here to add a new movie!</a>
  </div>
<?php endif; ?>