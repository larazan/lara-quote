<div class="relative inline-flex" x-data="{ openShare: false }" >

    <button 
        class="bg-[#33baf0] hover:bg-[#01b4e4] border border-[#00aed9] shadow px-2 py-1.5 font-extralight text-white inline-flex items-center space-x-1 rounded"
        aria-haspopup="true" @click.outside="openShare = false" @click.prevent="openShare = !openShare" :aria-expanded="openShare"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z" clip-rule="evenodd" />
        </svg>
        <span class="text-sm text-white font-semibold">
            Share
        </span>
    </button>
 
  <div class="flex origin-top-right z-30 absolute top-full shadow-menu2 left-0 -mr-2 md:-mr-2 sm:mr-0 min-w-72 w-72 bg-white rounded border border-slate-200 py-1.5  shadow-lg overflow-hidden mt-1.5 md:mt-1.5" enter="transition ease-out duration-200 transform" enterStart="opacity-0 -translate-y-2" enterEnd="opacity-100 translate-y-0" leave="transition ease-out duration-200" leaveStart="opacity-100" leaveEnd="opacity-0"  @keydown.escape.window="openShare = false" x-show="openShare" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
    <div class="flex mx-auto w-full p-2">
        {!! $shareComponent !!}
    </div>
  </div>
  
</div>