<?php

use function Core\flash;

$validations = flash()->get('validations') ?? [];
?>

<ul class="bg-base-300 box w-56 rounded-l-box flex flex-col divide-y divide-base-100">
  <?php

  use function Core\getErrors;
  use function Core\request;

  foreach ($notes as $key => $note) : ?>
    <a href="/notes?id=<?= $note->id ?><?= request()->get('search', '', '&search=') ?>" class="focus:outline-none flex flex-col gap-1 w-full text-gray-100 px-4 py-3 cursor-pointer hover:bg-base-200
      <?php if ($key == 0) : ?> rounded-tl-box <?php endif; ?>
      <?php if ($note->id == $selectedNote->id) : ?> bg-base-200 <?php endif; ?>">
      <?= $note->title ?>
      <span class="text-sm"> id: <?= $note->id ?> </span>
    </a>
  <?php endforeach; ?>
</ul>
<div class="bg-base-200 w-full rounded-r-box p-10 flex flex-col space-y-6">
  <form class="w-full" action="/note" method="POST" id="form-update">
    <input type="hidden" name="__method" value="PUT">
    <input type="hidden" name="id" value="<?= $selectedNote->id ?>">
    <label class="form-control w-full">
      <div class="label">
        <span class="label-text">Title</span>
      </div>
      <input value="<?= isset($selectedNote) ? $selectedNote->title : '' ?>" name="title" type="text" placeholder="Your title here" class="input input-bordered w-full" />
      <span class="text-error mt-1 text-sm"><?= getErrors($validations, 'title') ?></span>
    </label>
    <label class="form-control mt-4">
      <div class="label">
        <span class="label-text">Your Note</span>
      </div>
      <textarea name="note" class="textarea textarea-bordered h-24" placeholder="Your note here"><?= isset($selectedNote) ? $selectedNote->note : '' ?></textarea>
      <span class="text-error mt-1 text-sm"><?= getErrors($validations, 'note') ?></span>
    </label>
  </form>
  <div class="flex items-center justify-between">
    <form action="/note" method="POST">
      <input type="hidden" name="__method" value="DELETE">
      <input type="hidden" name="id" value="<?= $selectedNote->id ?>">
      <button class="btn btn-error" type="submit">Delete</button>
    </form>
    <button class="btn btn-secondary" type="submit" form="form-update">Update</button>
  </div>
</div>