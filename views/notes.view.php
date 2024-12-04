<ul class="bg-base-300 box w-56 rounded-l-box flex flex-col divide-y divide-base-100">
  <?php

use function Core\request;

 foreach ($notes as $key => $note) : ?>
    <a
      href="/notes?id=<?= $note->id ?><?= request()->get('search', '', '&search=') ?>"
      class="focus:outline-none flex flex-col gap-1 w-full text-gray-100 px-4 py-3 cursor-pointer hover:bg-base-200
      <?php if ($key == 0) : ?> rounded-tl-box <?php endif; ?>
      <?php if ($note->id == $selectedNote->id) : ?> bg-base-200 <?php endif; ?>"
      >
      <?= $note->title ?>
      <span class="text-sm"> id: <?= $note->id ?> </span>
    </a>
  <?php endforeach; ?>
</ul>
<div class="w-full bg-base-200 rounded-r-box p-10 flex flex-col space-y-6">
  <label class="form-control w-full">
    <div class="label">
      <span class="label-text">Title</span>
    </div>
    <input value="<?= isset($selectedNote) ? $selectedNote->title : '' ?>" name="title" type="text" placeholder="Type here" class="input input-bordered w-full" />
  </label>
  <label class="form-control">
    <div class="label">
      <span class="label-text">Your note</span>
    </div>
    <textarea name="note" class="textarea textarea-bordered h-24" placeholder="Bio"><?= isset($selectedNote) ? $selectedNote->note : '' ?></textarea>
  </label>

  <div class="flex items-center justify-between">
    <button class="btn btn-error">Delete</button>
    <button class="btn btn-secondary">Update</button>
  </div>
</div>