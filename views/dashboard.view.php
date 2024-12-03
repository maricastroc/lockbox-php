<ul class="menu bg-base-300 box w-56 rounded-l-box">
  <li><a>Item 1</a></li>
  <li><a>Item 2</a></li>
  <li><a>Item 3</a></li>
</ul>
<div class="w-full bg-base-200 rounded-r-box p-10 flex flex-col space-y-6">
  <label class="form-control w-full">
    <div class="label">
      <span class="label-text">Title</span>
    </div>
    <input type="text" placeholder="Type here" class="input input-bordered w-full" />
  </label>
  <label class="form-control">
    <div class="label">
      <span class="label-text">Your note</span>
    </div>
    <textarea class="textarea textarea-bordered h-24" placeholder="Bio"></textarea>
  </label>

  <div class="flex items-center justify-between">
    <button class="btn btn-error">Delete</button>
    <button class="btn btn-secondary">Update</button>
  </div>
</div>