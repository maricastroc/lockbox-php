<?php
$movie = $data['movie'];
$ratings = $data['ratings'];
$showForm = !empty(flash()->get('validations')) || (isset($_GET['show_form']) && $_GET['show_form'] == 1);
$message = flash()->get('message');
$validations = flash()->get('validations') ?? [];

require '../views/partials/utils.php';
?>

<style>
  .custom-height { max-height: 70vh; }
  .custom-scrollbar {
    overflow-y: auto;
  }
  .custom-scrollbar::-webkit-scrollbar { width: 8px; }
  .custom-scrollbar::-webkit-scrollbar-track { background: #2a2a2a; }
  .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #818cf8; border: 2px solid #2a2a2a; }
  @media (min-width: 1200px) {
    .responsive-container { width: clamp(60rem, 80vw, 20rem); }
  }
</style>

<div class="flex flex-col">
  <?= renderMessage($message) ?>
  
  <section class="responsive-container flex flex-col md:flex-row gap-10 md:gap-6 lg:gap-0 mx-auto items-center md:items-stretch md:justify-content-stretch">
    <article class="md:mt-3 min-w-[15rem] max-w-[30rem] md:max-w-80">
      <div class="w-auto mx-auto p-2 rounded-md bg-zinc-800 text-neutral-300 md:sticky md:top-4 flex flex-col">
        <div class="flex flex-col gap-4 py-2 items-center">
          <?= renderMovieImage($movie) ?>
          <div class="h-auto flex flex-col justify-between w-full text-center">
            <div>
              <p class="line-clamp-2 font-mono transition duration-200 font-semibold text-sm">
                <?= "{$movie->title} ({$movie->release_year})" ?>
              </a>
              <div class="text-xs italic my-2"><?= $movie->director ?></div>
              <div class="text-xs">
                <?php if ($movie->getAverageRating() > 0) : ?>
                  <?= renderRatingStars($movie->getAverageRating(), $movie->getRatingsQuantity()) ?>
                <?php else : ?>
                  <p class="text-neutral-200 font-mono mb-2 text-xs">(<?= $movie->getRatingsQuantity() ?> ratings)</p>
                <?php endif; ?>
              </div>
            </div>
            <section class="px-2 mt-4 text-xs font-mono leading-5 max-[400px]:mt-6"><?= $movie->synopsis ?></section>
          </div>
        </div>
      </div>
      <?php if (auth()) : ?>
        <button id="review-toggle-btn" onclick="toggleReviewForm()" class="hover:bg-indigo-600 transition duration-200 mt-4 py-2 rounded-lg w-full bg-indigo-700 text-neutral-300 font-mono text-sm">
          Review
        </button>
      <?php endif; ?>
    </article>

    <aside id="reviews-section" class="w-full md:max-h-[30rem] lg:max-h-[31rem] custom-scrollbar flex flex-col max-w-[35rem] mx-auto p-2 gap-4">
      <?php if (!empty($validations)) : ?>
        <div class="mb-4 w-auto items-center text-center text-sm text-red-600 font-mono">
          <ul>
            <?php foreach ($validations as $validation) : ?>
              <li><?= htmlspecialchars($validation) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <h2 class="font-mono heading-md">Reviews</h2>
      <?php if (!empty($ratings)) : ?>
        <?php foreach ($ratings as $rating) : ?>
          <?= renderReview($rating) ?>
        <?php endforeach; ?>
      <?php else : ?>
        <section class="max-w-[35rem] mx-auto w-full h-full">
          <div class="flex items-center justify-center mt-4 min-h-[25rem] max-w-screen bg-zinc-800 rounded-md p-4 text-neutral-200">
            <p class="text-sm font-mono">No reviews.</p>
          </div>
        </section>
      <?php endif; ?>
    </aside>
    <?php require "../views/partials/_review.php"; ?>
  </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const showForm = <?= json_encode($showForm) ?>;
    if (showForm) {
      toggleReviewForm();
    }
  });

  function toggleReviewForm() {
    const reviewsSection = document.getElementById('reviews-section');
    const reviewFormSection = document.getElementById('review-form-section');
    const reviewToggleBtn = document.getElementById('review-toggle-btn');

    reviewsSection.classList.toggle('hidden');
    reviewFormSection.classList.toggle('hidden');

    reviewToggleBtn.innerText = reviewFormSection.classList.contains('hidden') ? 'Review' : 'Hide Review';
  }
</script>
