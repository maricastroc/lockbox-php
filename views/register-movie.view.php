<?php
$validations = flash()->get('validations') ?? [];
?>

<?php if (!empty($validations) && is_array($validations)) : ?>
  <div class="mb-4 w-auto items-center text-center text-sm text-red-600 font-mono mb-4">
    <ul>
      <?php foreach ($validations as $validation) : ?>
        <li><?= htmlspecialchars($validation) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<div id="review-form-section" class="w-full max-w-[35rem] mx-auto p-2">
  <h2 class="font-mono text-center heading-md">Register a New Movie!</h2>
  <form enctype="multipart/form-data" method="POST" class="mt-4 flex flex-col bg-neutral-900 p-4 rounded-md border border-neutral-700 text-neutral-300">
    <?php require "views/partials/_image-input.php"; ?>
  
    <div class="flex flex-col gap-1 mb-6">
      <label class="font-mono text-sm">Movie Title</label>
      <input name="title" type="text" class="bg-zinc-800 text-neutral-200 p-2 rounded-md" required>
    </div>

    <div class="flex flex-col gap-1 mb-6">
      <label class="font-mono text-sm">Movie Synopsis</label>
      <textarea required name="synopsis" rows="6" class="bg-zinc-800 text-neutral-200 p-2 rounded-md"></textarea>
    </div>

    <div class="flex flex-col gap-1 mb-6">
      <label class="font-mono text-sm">Movie Director</label>
      <input name="director" type="text" class="bg-zinc-800 text-neutral-200 p-2 rounded-md" required>
    </div>

    <div class="flex flex-col gap-1 mb-6">
      <label class="font-mono text-sm">Release Year</label>
      <input name="release_year" type="number" min="1900" max="2099" step="1" class="bg-zinc-800 text-neutral-200 p-2 rounded-md" required>
    </div>
    
    <button type="submit" class="hover:bg-indigo-600 transition duration-200 py-2 rounded-xl bg-indigo-600 text-neutral-300 font-mono text-sm">
      Register New Movie
    </button>
  </form>
</div>
