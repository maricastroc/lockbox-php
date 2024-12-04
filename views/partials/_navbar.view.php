<?php

use function Core\auth;
?>
<div class="navbar bg-base-100">
    <div class="flex-1">
      <a href="/notes" class="btn btn-ghost text-xl">Lockbox</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li><a>Link</a></li>
        <li>
          <details>
            <summary><?= auth()->name ?></summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <li><a href="/logout">Logout</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>