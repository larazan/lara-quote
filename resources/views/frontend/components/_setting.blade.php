<div  class="hidden2 flex flex-col w-full bg-white fixed top-0 h-full shadow-2xl md:w-[35vw] transition-all duration-300 z-50 px-4 lg:px-[35px]" id="menubar" :class="filterOpen ? 'left-0' : '-left-full'" x-cloak>
  <div class="flex w-full items-center justify-between py-4 border-b">
    <div class="w-1/2">
      <span class="uppercase font-semibold text-gray-900">Setting</span>
    </div>

    <div class="flex justify-end w-1/2">
      <div @click.stop="filterOpen = !filterOpen" class="cursor-pointer w-8 h-8 flex justify-center items-center rounded-full shadow bg-white hover:bg-slate-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-6 h-6 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
    </div>
  </div>

  <div class="divide-y">
    <!-- bg color -->
    <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
      <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
        <span class="text-sm font-bold uppercase text-gray-900">Background Color</span>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>

        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>

      </button>
      <div :class="open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'" class="grid overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm">
        <!-- content filter -->
        <div class="overflow-hidden pb-0">
          <div class="duration-300 px-0 pb-3">

            <div class="rounded-md bg-pink-100 px-4 py-3" x-data="app()" x-cloak>
              <div class="flex flex-wrap -mx-2">
                <template x-for="(color, index) in colors" :key="index">
                  <div
                    class="px-1.5 ">
                    <template x-if="colorSelected === color">
                      <div
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                        :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"></div>
                    </template>

                    <template x-if="colorSelected != color">
                      <div
                        @click="colorSelected = color"
                        @keydown.enter="colorSelected = color"
                        role="checkbox"
                        tabindex="0"
                        :aria-checked="colorSelected"
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                        :style="`background: ${color};`"></div>
                    </template>
                  </div>
                </template>
              </div>
            </div>

          </div>
        </div>
        <!-- end content filter -->
      </div>
    </div>
    <!-- end bg color -->

     <!-- align -->
     <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
      <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
        <span class="text-sm font-bold uppercase text-gray-900">Font</span>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>

        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>

      </button>
      <div :class="open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'" class="grid overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm">
        <!-- content filter -->
        <div class="overflow-hidden pb-0">
          <div class="duration-300 px-0 pb-3">

          <div class="flex space-x-2">
            <select  class="h-full2 rounded border block appearance-none w-24 bg-white border-gray-300 text-gray-700 py-2 px-4 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                <option value="">Select</option>
                @foreach($fontSize as $value)
                <option class="capitalize" value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <div class="inline-flex items-center rounded-md shadow-sm">
              <button
                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-300 rounded-l-lg font-medium px-3 py-1 md:py-2 inline-flex items-center">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                  </svg>
                </span>
              </button>
              <button
                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-300 font-medium px-3 py-1 md:py-2 inline-flex items-center">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                </span>
              </button>
              <button
                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-300 rounded-r-lg font-medium px-3 py-1 md:py-2 inline-flex  items-center">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                  </svg>
                </span>
              </button>
            </div>
          </div>

          </div>
        </div>
        <!-- end content filter -->
      </div>
    </div>
    <!-- end align -->

    <!-- font family-->
    <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
      <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
        <span class="text-sm font-bold uppercase text-gray-900">Font Family</span>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>

        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>

      </button>
      <div :class="open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'" class="grid overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm">
        <!-- content filter -->
        <div class="overflow-hidden pb-0">
          <div class="duration-300 px-0 pb-3">
            <div class="flex w-full pt-1 px-1">
              <div x-data="select()" class="relative w-full z-50" @click.outside="openFont = false">
                <button @click="toggle" :class="(openFont) && 'ring-blue-600'" class="flex w-full items-center justify-between rounded border-slate-300 bg-white p-2 py-2 md:py-3 ring-1 ring-gray-300">
                  <span x-text="(language == '') ? 'Choose font' : language"></span>

                  <svg x-show="!openFont" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>

                  <svg x-show="openFont" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                  </svg>

                </button>

                <ul class="z-50 absolute2 relative mt-1 w-full rounded bg-gray-50 ring-1 ring-gray-300" x-show="openFont">
                  <li class="cursor-pointer select-none p-2 hover:bg-gray-200" @click="setLanguage('Python')">Python</li>
                  <li class="cursor-pointer select-none p-2 hover:bg-gray-200" @click="setLanguage('PHP')">PHP</li>
                  <li class="cursor-pointer select-none p-2 hover:bg-gray-200" @click="setLanguage('C#')">C#</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end content filter -->
      </div>
    </div>
    <!-- end font family -->

    <!-- color -->
    <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
      <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
        <span class="text-sm font-bold uppercase text-gray-900">Color</span>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>

        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-4 h-4 text-gray-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>

      </button>
      <div :class="open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'" class="grid overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm">
        <!-- content filter -->
        <div class="overflow-hidden pb-0">
          <div class="duration-300 px-0 pb-3">

          <div class="rounded-md bg-[#fbf8f1] px-4 py-3" x-data="app()" x-cloak>
              <div class="flex flex-wrap -mx-2">
                <template x-for="(color, index) in colors" :key="index">
                  <div
                    class="px-1.5 ">
                    <template x-if="colorSelected === color">
                      <div
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                        :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"></div>
                    </template>

                    <template x-if="colorSelected != color">
                      <div
                        @click="colorSelected = color"
                        @keydown.enter="colorSelected = color"
                        role="checkbox"
                        tabindex="0"
                        :aria-checked="colorSelected"
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                        :style="`background: ${color};`"></div>
                    </template>
                  </div>
                </template>
              </div>
            </div>

          </div>
        </div>
        <!-- end content filter -->
      </div>
    </div>
    <!-- end color -->

   



    <div class="pt-4">
      <div class="bg-[#73dfb7] hover:bg-white uppercase  rounded-full text-slate-800 border-2 border-[#73dfb7] flex p-3 justify-center items-center w-full font-semibold cursor-pointer">
        Reset
      </div>
    </div>
  </div>
</div>

<div :class="filterOpen ? 'block' : 'hidden'" class=" opacity-30 fixed inset-0 z-30 bg-black"></div>

@push('js')
<script>
  function app() {
    return {
      isOpen: false,
      colors: ['#2196F3', '#009688', '#9C27B0', '#FFEB3B', '#afbbc9', '#4CAF50', '#2d3748', '#f56565', '#ed64a6'],
      colorSelected: '#2196F3'
    }
  }

  function select() {
    return {
      openFont: false,
      language: "",

      toggle() {
        this.openFont = !this.openFont;
      },

      setLanguage(val) {
        this.language = val;
        this.openFont = false;
      },
    }
  }
</script>
@endpush