<div class="bg-base-300 box w-56 rounded-l-box">
<div class="bg-base-200 p-4">
  + Note
</div>
</div>

<div class="w-full bg-base-200 rounded-r-box p-10">
  <form action="/notes/create" method="post" class="flex flex-col space-y-6">
    <label class="form-control w-full">
      <div class="label">
        <span class="label-text">Title</span>
      </div>
      <input name="title" type="text" placeholder="Type here" class="input input-bordered w-full" />
    </label>
    <label class="form-control">
      <div class="label">
        <span class="label-text">Your note</span>
      </div>
      <textarea name="note" class="textarea textarea-bordered h-24" placeholder="Bio"></textarea>
    </label>

    <div class="flex items-center justify-end">
      <button class="btn btn-secondary">Save</button>
    </div>
  </form>
</div>