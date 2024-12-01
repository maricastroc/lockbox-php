<style>
  .file-input {
    display: none;
  }

  .choose-file-btn {
    border: solid 1px #818cf8;
    border-radius: 8px;
    padding: 0.2rem 0.5rem;
    font-size: 0.75rem;
  }

  .choose-file-btn:hover {
    transition: 200ms;
    border: solid 1px #818cf8;
    background-color: #818cf8;
    color: #e5e5e5;
  }
</style>

<div class="flex flex-col gap-1 mb-6">
  <label class="font-mono text-sm">Movie Cover</label>
  <div class="flex items-center bg-zinc-800 text-neutral-200 p-2 rounded-md font-mono text-xs">
    <input name="cover_url" type="file" class="file-input" required onchange="updateFileName(this)" id="image-input">
    <button type="button" class="text-indigo-400 choose-file-btn flex items-center gap-2" onclick="document.getElementById('image-input').click();">
    <i class="ph ph-upload-simple text-sm text-indigo-400"></i>
    Choose File
    </button>
    <span id="file-name" class="text-neutral-200 ml-2"></span>
  </div>
</div>

<script>
  function updateFileName(input) {
    const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
    document.getElementById('file-name').textContent = fileName;
  }
</script>