<?php
$validations = flash()->get('validations') ?? [];
$message = flash()->get('message');
?>

<form method="POST" class="w-[17rem] md:w-[30rem] gap-3 flex flex-col space-x-2 mt-6 mx-auto justify-center">
<?php if (!empty($validations) && is_array($validations)): ?> 
  <div class="text-red-600 font-mono mb-4">
    <ul>
      <?php foreach ($validations as $validation): ?>
        <li><?= htmlspecialchars($validation) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<p class="text-neutral-100 font-mono mb-2 text-center">join us!</p>
<div class="flex flex-col gap-1 mb-1 text-neutral-200">
  <label class="font-mono text-sm">Name</label>
  <input placeholder="Jon Doe" name="name" type="name" class="text-sm bg-zinc-800 text-neutral-100 p-2 py-2.5 rounded-md" required>
</div>
<div class="flex flex-col gap-1 mb-1 text-neutral-200">
  <label class="font-mono text-sm">E-mail</label>
  <input placeholder="user@email.com" name="email" type="email" class="text-sm bg-zinc-800 text-neutral-100 p-2 py-2.5 rounded-md" required>
</div>
<div class="flex flex-col gap-1 mb-1 text-neutral-200">
  <label class="font-mono text-sm">Confirm e-mail</label>
  <input placeholder="user@email.com" name="confirm_email" type="email" class="text-sm bg-zinc-800 text-neutral-100 p-2 py-2.5 rounded-md" required>
</div>
<div class="flex flex-col gap-1 mb-1 text-neutral-200">
  <label class="font-mono text-sm">Password</label>
  <input placeholder="********" name="password" type="password" class="text-sm bg-zinc-800 text-neutral-100 p-2 py-2.5 rounded-md" required>
</div>
  <div class="flex items-center justify-center mx-auto">
    <button href="/" class="text-sm mt-6 p-2 w-24 mx-auto rounded-xl bg-indigo-700 font-mono transition duration-200 hover:bg-indigo-600">
      <p class="text-sm">register</p>
    </button>
  </div>
</form>