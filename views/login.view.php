<?php
$validations = flash()->get('validations') ?? [];
$message = flash()->get('successfully_registered');

require '../views/partials/utils.php';
?>

<form method="POST" class="w-[17rem] md:w-[30rem] gap-3 flex flex-col space-x-2 mt-6 mx-auto justify-center">
  <?php if (!empty($message)) : ?>
    <p class="text-indigo-400 font-mono mb-2 text-center">
      <?= htmlspecialchars($message) ?>
    </p>
  <?php endif; ?>

    <div class="flex flex-col items-center mx-auto mb-10 gap-4">
        <?= renderUserAvatar($user) ?>
        <p class="text-neutral-200 font-mono">
          <span class="text-lg">
            <?= "hello, " . ($user ? $user->name : 'reader') . "!" ?>
          </span>
        </p>
      </div>
      <?php if (!empty($validations)) : ?>
    <div class="text-sm text-red-500 font-mono mb-4 text-center">
      <ul>
        <?php foreach ($validations as $validation) : ?>
          <li><?= htmlspecialchars($validation) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <div class="flex flex-col gap-1 mb-1 text-neutral-200">
    <label class="font-mono text-sm">E-mail</label>
    <input placeholder="user@email.com" name="email" type="email" class="text-sm bg-blue-950 text-neutral-100 p-3 py-2.5 rounded-lg" required>
  </div>
  <div class="flex flex-col gap-1 mb-1 text-neutral-200">
    <label class="font-mono text-sm">Password</label>
    <input placeholder="********" name="password" type="password" class="text-sm bg-blue-950 text-neutral-100 p-3 py-2.5 rounded-lg" required>
  </div>
  <div class="flex items-center justify-center mx-auto">
    <a href="/register-user" class="p-1 pt-0 w-72 mx-auto bg-transparent">
      <p class="text-center font-mono text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition duration-200">or click here to sign up!</p>
    </a>
  </div>
  <div class="flex items-center justify-center mx-auto">
  <button href="/" class="text-sm mt-6 p-2 w-24 mx-auto rounded-xl bg-blue-950 font-mono transition duration-200 hover:bg-blue-900">
      <p class="text-sm">login</p>
    </button>
  </div>
</form>