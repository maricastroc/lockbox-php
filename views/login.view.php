<?php
$validations = flash()->get('validations') ?? [];
?>

<div class="flex flex-col md:grid md:grid-cols-2 bg-base-100">
  <div class="hero min-h-screen flex justify-center items-center px-4 md:px-10 lg:px-40 bg-base-100">
    <div class="md:-mt-20 hero-content text-center md:text-left">
      <div>
        <p class="py-2 text-lg md:text-xl">
          Welcome to
        </p>
        <h1 class="text-5xl lg:text-6xl font-bold">Lockbox</h1>
        <p class="pt-6 md:pt-4 pb-4 text-lg md:text-xl">
          where you keep <span class="italic text-secondary">everything</span> safely.
        </p>
      </div>
    </div>
  </div>

  <div class="bg-base-100 md:bg-white hero flex justify-center items-center px-4 lg:px-10">
    <div class="hero-content w-full max-w-md">
      <form action="/login" method="post" class="w-full">
        <div class="card bg-base-100 md:shadow-xl w-full">
          <div class="card-body">
            <div class="card-title text-gray-100 mb-4">Login here!</div>
            <label class="form-control w-full">
              <div class="label">
                <span class="label-text text-gray-100 text-md">Your email:</span>
              </div>
              <input type="text" name="email" placeholder="user@email.com" class="text-gray-100 input input-bordered w-full" spellcheck="false" value="<?= old('email') ?>" />
              <span class="text-error mt-1 pl-2 text-sm"><?= getErrors($validations, 'email') ?></span>
            </label>
            <label class="form-control w-full">
              <div class="label">
                <span class="label-text text-gray-100 text-md">Your password:</span>
              </div>
              <input type="password" name="password" placeholder="password" class="text-gray-100 input input-bordered w-full" spellcheck="false" />
              <span class="text-error mt-1 pl-2 text-sm"><?= getErrors($validations, 'password') ?></span>
            </label>
            <?php if (invalidUserError($validations) !== ''): ?>
              <div class="text-error text-left text-sm px-2 mb-4">
                <?= invalidUserError($validations) ?>
              </div>
            <?php endif; ?>
            <div class="card-actions w-full mt-4">
              <button class="btn btn-secondary btn-block text-base-100">Login</button>
              <a href="/register" class="btn btn-link btn-secondary btn-block text-gray-100">or sign up here</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>