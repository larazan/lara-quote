<div class="col-start-1 sm:col-span-3">
    <label for="title" class="block text-sm font-medium text-gray-700">
        Tags
    </label>
    <div>
    <div x-data="{tags: @entangle('tags'), newTag: '' }">
      <template x-for="tag in tags">
        <input type="hidden" :value="tag" name="tags">
      </template>

      <div class="max-w-sm w-full ">
        <div class="tags-input">

          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter some tags" @keydown.enter.prevent="if (newTag.trim() !== '') tags.push(newTag.trim()); newTag = ''" @keydown.backspace="if (newTag.trim() === '') tags.pop()" x-model="newTag">

          <template x-for="tag in tags" :key="tag">
            <div class="bg-gray-200 inline-flex items-center text-sm rounded mt-2 mr-1">
              <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
              <button type="button" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none" @click="tags = tags.filter(i => i !== tag)">
                <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                </svg>
              </button>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</div>