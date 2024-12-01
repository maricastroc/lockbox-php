<div id="review-form-section" class="hidden w-full max-w-[35rem] mx-auto p-2 gap-4">
  <h2 class="font-mono heading-md">Submit Your Review!</h2>
  <form method="POST" class="mt-4 flex flex-col gap-4 bg-neutral-900 p-4 rounded-md border border-neutral-700 text-neutral-300">
    <label class="font-mono text-sm">Your Review</label>
    <textarea required name="review" rows="6" class="bg-zinc-800 text-neutral-200 p-2 rounded-md" required></textarea>

    <label required class="font-mono text-sm">Rating</label>
    <input type="number" name="rating" min="1" max="5" class="bg-zinc-800 text-neutral-200 p-2 rounded-md" required>

    <button type="submit" class="hover:bg-indigo-600 transition duration-200 py-2 rounded-lg bg-indigo-700 text-neutral-300 font-mono text-sm">
      Submit Review
    </button>
  </form>
</div>