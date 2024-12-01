<article onclick="window.location.href='/movie?id=<?= htmlspecialchars($movie->id) ?>'" class="cursor-pointer w-full p-6 bg-zinc-800 rounded-md hover:bg-zinc-700 transition duration-200 text-neutral-300" aria-labelledby="movie-<?= htmlspecialchars($movie->id) ?>">
  <div class="flex flex-col">
    <div class="flex flex-col gap-4 min-[400px]:flex-row max-[400px]:items-center">
      <?= renderMovieImage($movie) ?>
      <div class="h-auto flex flex-col justify-between w-full max-[400px]:text-center">
        <div>
          <a href="/movie?id=<?= htmlspecialchars($movie->id) ?>" class="line-clamp-3 font-mono hover:text-neutral-100 transition duration-200 font-semibold text-sm">
            <?= htmlspecialchars($movie->title) ?> (<?= htmlspecialchars($movie->release_year) ?>)
          </a>
          <div class="text-xs italic my-2">
            <?= htmlspecialchars($movie->director) ?>
          </div>

          <div class="text-xs">
            <?php if ($movie->getAverageRating() > 0) : ?>
              <p class="text-neutral-100 font-mono text-xs">
                <?= str_repeat('<i class="ph ph-star text-md m-0 p-0"></i>', $movie->getAverageRating()) ?>
                (<?= $movie->getRatingsQuantity() ?> ratings)
              </p>
            <?php else : ?>
              <p class="text-neutral-200 font-mono mb-2 text-xs">
                (<?= $movie->getRatingsQuantity() ?> ratings)
              </p>
            <?php endif; ?>
          </div>
        </div>

        <section class="text-xs font-mono mt-6 max-[400px]:mt-6 leading-5">
          <?= htmlspecialchars($movie->synopsis) ?>
        </section>
      </div>
    </div>
  </div>
</article>