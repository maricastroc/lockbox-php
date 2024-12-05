<?php

use function Core\flash;

$validations = flash()->get('validations') ?? [];
?>

<div class="flex flex-col lg:flex-row gap-4 lg:gap-0 w-full">
  <ul class="w-full bg-base-300 box rounded-box lg:rounded-r-none flex flex-col divide-y divide-base-100 lg:w-56 w-full">
    <?php

    use function Core\getErrors;
    use function Core\request;
use function Core\session;

    foreach ($notes as $key => $note) : ?>
      <a href="/notes?id=<?= $note->id ?><?= request()->get('search', '', '&search=') ?>" class="focus:outline-none flex flex-col gap-1 w-full text-gray-100 px-4 py-3 cursor-pointer hover:bg-base-200
        <?php if ($key == 0) : ?> rounded-t-box lg:rounded-tr-none <?php endif; ?>
        <?php if ($note->id == $selectedNote->id) : ?> bg-base-200 <?php endif; ?>">
        <?= $note->title ?>
        <span class="text-sm"> id: <?= $note->id ?> </span>
      </a>
    <?php endforeach; ?>
  </ul>

  <div class="bg-base-200 w-full rounded-box lg:rounded-l-none p-6 lg:p-10 flex flex-col space-y-6">
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
        <textarea <?php if (!session()->get('show')): ?> disabled <?php endif; ?> name="note" class="textarea textarea-bordered h-24 w-full" placeholder="Your note here"><?= isset($selectedNote) ? $selectedNote->note() : '' ?></textarea>
        <span class="text-error mt-1 text-sm"><?= getErrors($validations, 'note') ?></span>
      </label>
    </form>
    <div class="flex items-center justify-between mt-4">
      <form action="/note" method="POST">
        <input type="hidden" name="__method" value="DELETE">
        <input type="hidden" name="id" value="<?= $selectedNote->id ?>">
        <button class="btn btn-error" type="submit">Delete</button>
      </form>
      <button class="btn btn-secondary" type="submit" form="form-update">Update</button>
    </div>
  </div>
</div>
