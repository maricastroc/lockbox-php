<?php

use function Core\flash;
use function Core\getErrors;

$validations = flash()->get('validations') ?? [];
$message = flash()->get('successfully_registered');
?>

<div class="flex flex-col lg:flex-row gap-4 lg:gap-0 w-full">
  <div class="bg-base-300 box w-full rounded-box lg:w-56 lg:rounded-tr-none lg:rounded-br-none">
    <div class="bg-base-200 p-4 rounded-box lg:rounded-b-none lg:rounded-tr-none">
      + Note
    </div>
  </div>

  <div class="w-full bg-base-200 rounded-box lg:rounded-l-none p-6 lg:p-10 flex flex-col space-y-6">
    <form action="/notes/create" method="post" class="flex flex-col space-y-6">
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Title</span>
        </div>
        <input name="title" type="text" placeholder="Your title here" class="input input-bordered w-full" />
        <span class="text-error mt-1 text-sm"><?= getErrors($validations, 'title') ?></span>
      </label>
      <label class="form-control">
        <div class="label">
          <span class="label-text">Your note</span>
        </div>
        <textarea name="note" class="textarea textarea-bordered h-24" placeholder="Your note here"></textarea>
        <span class="text-error mt-1 text-sm"><?= getErrors($validations, 'note') ?></span>
      </label>

      <div class="flex items-center justify-end">
        <button class="btn btn-secondary">Save</button>
      </div>
    </form>
  </div>
</div>
