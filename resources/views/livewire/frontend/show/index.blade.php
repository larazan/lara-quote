


<main class="flex flex-col bg-white min-h-full w-full pt-16 md:pt-[100px]">

  <!-- Setting -->
  <div 
    class="hidden2 flex flex-col w-[70vw] bg-white fixed overflow-y-auto top-0 h-full shadow-2xl md:w-[35vw] transition-all duration-300 z-50 lg:px-[35px] custom-scrollbar" id="menubar" :class="filterOpen ? 'left-0' : '-left-full'" x-cloak>
    <div class="sticky top-0 flex w-full items-center justify-between px-4 py-3 border-b bg-white">
      <div class="w-1/2">
        <span class="uppercase font-bold text-gray-900">Setting</span>
      </div>

      <div class="flex justify-end w-1/2">
        <div @click.stop="filterOpen = !filterOpen" class="cursor-pointer w-8 h-8 flex justify-center items-center rounded-full shadow bg-white hover:bg-slate-50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-6 h-6 text-gray-900">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
      </div>
    </div>

    <div class="divide-y px-4">

      <!-- size -->
      <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
        <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
          <span class="text-sm font-bold uppercase text-gray-900">Size</span>

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

              <div class="flex">

                <div class="flex items-center space-x-2">
                  <!-- instagram -->
                  <button
                    wire:click="instaSize()"
                    class="@if($insta){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif rounded shadow-sm  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300  font-medium px-1 py-1 md:py-1 inline-flex items-center">
                    <span>
                      <svg class="w-6 h-6 md:w-8 md:h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                      </svg>
                    </span>
                  </button>
                  <!-- facebook -->
                  <button
                    wire:click="fbSize"
                    class="@if($fb){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif rounded shadow-sm  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300  font-medium px-1 py-1 md:py-1 inline-flex items-center">
                    <span>
                      <svg class="w-6 h-6 md:w-8 md:h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                      </svg>
                    </span>
                  </button>
                  <!-- twitter -->
                  <button
                    wire:click="twitterSize"
                    class="@if($twit){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif rounded shadow-sm  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300  font-medium px-1 py-1 md:py-1 inline-flex items-center">
                    <span>
                      <svg class="w-6 h-6 md:w-8 md:h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                      </svg>
                    </span>
                  </button>
                  <!-- pinterest -->
                  <button
                    wire:click="pinterestSize"
                    class="@if($pint){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif rounded shadow-sm  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300  font-medium px-1 py-1 md:py-1 inline-flex items-center">
                    <span>
                      <svg
                        class="w-6 h-6 md:w-8 md:h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 496 512">
                        <path
                          d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z" />
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

      <!-- bg color -->
      <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
        <button @click="open = !open" class="flex items-center justify-between py-3 group font-semibold md:font-bold">
          <span class="text-sm font-bold uppercase text-gray-900">Background Color {{ $bgselect}}</span>

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

              <x-background-color
                wire:model="bgselect"
                :options="$bgs" />

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

              <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
                <select class="h-full2 rounded border block appearance-none w-full md:w-28 bg-white border-gray-300 text-gray-700 py-2 px-4 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" wire:model="sizeselect">
                  <option value="">Size</option>
                  @foreach($fontSizes as $key => $value)
                  <option class="" value="{{ $value['value'] }}">{{ $value['name'] }}</option>
                  @endforeach
                </select>

                <div class="inline-flex items-center rounded-md shadow-sm">
                  <button
                    wire:click="changeAlign('left')"
                    class="@if($fontAlign == 'left'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300 rounded-l-lg font-medium md:px-3 px-1 py-1 md:py-2 inline-flex items-center">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                      </svg>
                    </span>
                  </button>
                  <button
                    wire:click="changeAlign('center')"
                    class="@if($fontAlign == 'center'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif hover:text-blue-600 text-sm hover:bg-slate-100 border-y border-slate-300 font-medium md:px-3 px-1 py-1 md:py-2 inline-flex items-center">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>
                    </span>
                  </button>
                  <button
                    wire:click="changeAlign('right')"
                    class="@if($fontAlign == 'right'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300 rounded-r-lg font-medium md:px-3 px-1 py-1 md:py-2 inline-flex  items-center">
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
          <span class="text-sm font-bold uppercase text-gray-900">Font Family {{ $fontselect }}</span>

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
                <select class="h-full2 rounded border block appearance-none w-full bg-white border-gray-300 text-gray-700 py-3 px-4 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" wire:model="fontselect">
                  <option value="">Choose font</option>
                  @foreach($fonts as $value)
                  <option class="" value="{{ $value }}" style="font-family: {{ $value }}">{{ $value }}</option>
                  @endforeach
                </select>
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
          <span class="text-sm font-bold uppercase text-gray-900">Color {{ $colorselect }}</span>

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

              <x-color-select
                wire:model="colorselect"
                :options="$colors" />

            </div>
          </div>
          <!-- end content filter -->
        </div>
      </div>
      <!-- end color -->

      <!-- logo -->
      <div class="bg-white w-full" title="Price">
        <div class="w-full overflow-hidden pb-0">
          <div class="py-3">
            <div class="flex items-center justify-between">
              <div>
                <span class="text-sm font-bold uppercase text-gray-900">Logo</span>
              </div>
              
              <div class="inline-flex mr-2 bg-white w-auto">
                <label for="toggle" class="inline-flex relative items-center cursor-pointer">
                <input wire:model.lazy="checked" type="checkbox" id="toggle" class="sr-only peer">
                  <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-42 peer-focus:ring-slate-300 dark:peer-focus:ring-indigo-300 rounded-full peer dark:bg-slate-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white dark:bg-slate-500 after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-400 peer-checked:bg-green-500"></div>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- end logo -->

      <div class="pt-4 pb-10">
        <div wire:click="resetFilters" class="bg-[#73dfb7] hover:bg-white uppercase  rounded-full text-slate-800 border-2 border-[#73dfb7] flex p-3 justify-center items-center w-full font-semibold cursor-pointer">
          Reset
        </div>
      </div>
    </div>
  </div>

  <div :class="filterOpen ? 'block' : 'hidden'" class=" flex fixed justify-center items-center inset-0 z-30 bg-black/30">
    <div wire:loading class="flex flex-row space-x-1 text-white opacity-100">
      <div class="flex items-center text-lg md:text-2xl font-semibold tracking-tight">
        <svg aria-hidden="true" role="status" class="inline w-4 h-4 md:w-5 md:h-5 me-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2" />
        </svg>
        Processing...
      </div>
    </div>
  </div>


    <!-- end setting -->

    <div class="flex flex-row ">
      <div class="flex flex-1 flex-col items-center justify-center relative">
        <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
          <!-- Adv -->

          <section class="w-full mx-auto  mt-10 md:mt-10 px-5 pb-10">
            <div class="flex flex-row justify-between">
              <button @click="filterOpen = true"  class="flex justify-between shadow-sm text-black hover:text-blue-600 text-xs md:text-sm bg-white hover:bg-slate-100 border border-slate-300  rounded-sm font-medium px-2 py-2 space-x-1 md:space-x-2 items-center">
                <span class="inline-block font-semibold">Costumize</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 md:size-6 rotate-90">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                  </svg>
                </span>
              </button>

              <div class="flex space-x-2 justify-end2 md:justify-normal">
                <button class="bg-green-400 hover:bg-green-500 border border-green-500 px-2 py-1.5 font-extralight text-black text-xs md:text-sm inline-flex items-center space-x-1 rounded-sm shadow" title="download content" id="download">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  <span class="text-xs md:text-sm text-black font-semibold">
                    Download
                  </span>
                </button>
              </div>
            </div>

            <div class=" py-4 md:py-6 w-full columns-1 ">
              <div id="photo" class="relative {{ $style }}  mb-4 rounded2 flex flex-col justify-center items-center" style="background-color: {{ $bgColor }}; height: {{ $height }}">
                @if($quote)
                <div class="flex flex-col flex-grow2 justify-center items-center py-2 mt-6 lg:py-6 md:py-6 px-12 md:px-20 min-h-96">
                  <p id="myText" class="leading-tight md:leading-snug text-[{{ $fontColor }}] text-{{ $fontAlign }} text-{{ $fontSize }} md:text-{{ $fontSizeMd }} lg:text-{{ $fontSizeMd }} font-medium transition" style="font-family: {{ $fontFamily }}; color: {{ $fontColor }}">
                    {{ $quote->words }}
                  </p>
                  <div class=" px-2 py-4 flex w-full @if(Auth::check()){{ 'pb-8' }}@else{{ 'pb-0' }}@endif  justify-center">
                    <div class="flex w-full justify-{{ $justify }}">
                      <div class="flex justify-end" style="color: {{ $fontColor }}">
                        <span class="flex items-center justify-center text-md font-semibold">
                          - {{ $author }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="@if( $hasLogo ){{ 'flex' }}@else{{ 'hidden' }}@endif absolute bottom-0 left-0 px-6 pb-6 w-full justify-start">
                  <img src="/frontend/img/logo.png" alt="logo" class=" h-7 md:h-8" />
                </div>
                @endif
              </div>
              <div class="flex flex-wrap2 w-full items-center space-x-1 px-2 md:px-4 py-2">
                <span class="text-sm md:text-md font-semibold text-gray-600">
                  Tags:
                </span>
                <div class="flex flex-wrap gap-x-2 w-full">
                  @if(!empty($tags))
                  @foreach($tags as $t)
                  @php
                  $tg = General::toLowerString($t);
                  @endphp
                  <a href="{{ url('quotes/tag/' . $tg) }}">
                    <div class="py-0.5 px-2.5 bg-[#f1f5f9] border border-slate-300 rounded-sm flex items-center gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                      <div class="truncate text-xs tracking-wide text-black font-semibold capitalize">
                        {{ $t }}
                      </div>
                    </div>
                  </a>
                  @endforeach
                  @else
                  <div></div>
                  @endif

                </div>
              </div>

            </div>
          </section>

        </div>
      </div>
    </div>
</main>

@push('js')
<script>
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

@push('style')
<style>
  /* CHECKBOX TOGGLE SWITCH */
  /* @apply rules for documentation, these do not work as inline style */
  .toggle-checkbox:checked {
    @apply: right-0 border-green-400;
    right: 0;
    border-color: #68D391;
  }
  .toggle-checkbox:checked + .toggle-label {
    @apply: bg-green-400;
    background-color: #68D391;
  }
 
  </style>
@endpush