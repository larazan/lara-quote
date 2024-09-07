<main class="flex flex-col bg-white min-h-full w-full pt-16 md:pt-[100px]">


  <!-- Setting -->
  <div class="hidden2 flex flex-col w-full bg-white fixed overflow-y-auto top-0 h-full shadow-2xl md:w-[35vw] transition-all duration-300 z-50 px-4 lg:px-[35px]" id="menubar" :class="filterOpen ? 'left-0' : '-left-full'" x-cloak>
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

              <div class="flex space-x-2">
                <select class="h-full2 rounded border block appearance-none w-28 bg-white border-gray-300 text-gray-700 py-2 px-4 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" wire:model="sizeselect">
                  <option value="">Select</option>
                  @foreach($fontSizes as $key => $value)
                  <option class="" value="{{ $value['value'] }}">{{ $value['name'] }}</option>
                  @endforeach
                </select>

                <div class="inline-flex items-center rounded-md shadow-sm">
                  <button
                    wire:click="changeAlign('left')"
                    class="@if($fontAlign == 'left'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif  hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300 rounded-l-lg font-medium px-3 py-1 md:py-2 inline-flex items-center">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                      </svg>
                    </span>
                  </button>
                  <button
                    wire:click="changeAlign('center')"
                    class="@if($fontAlign == 'center'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif hover:text-blue-600 text-sm hover:bg-slate-100 border-y border-slate-300 font-medium px-3 py-1 md:py-2 inline-flex items-center">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>
                    </span>
                  </button>
                  <button
                    wire:click="changeAlign('right')"
                    class="@if($fontAlign == 'right'){{'text-blue-600 bg-slate-100'}}@else{{'text-slate-800 bg-white'}}@endif hover:text-blue-600 text-sm hover:bg-slate-100 border border-slate-300 rounded-r-lg font-medium px-3 py-1 md:py-2 inline-flex  items-center">
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
<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
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

            <button
              @click="filterOpen = true" class="flex justify-between shadow-sm text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-300  rounded-md font-medium px-3 py-2 space-x-1 md:space-x-2 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                </svg>
              </span>
              <span class="inline-block font-semibold">Setting</span>
              <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 md:size-6 rotate-90">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
              </span>
            </button>

            <div class="flex space-x-2 justify-end2 md:justify-normal">

              <button class="bg-green-400 hover:bg-green-500 border border-green-500 px-2 py-1.5 font-extralight text-black inline-flex items-center space-x-1 rounded" title="download content" id="download">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="text-sm text-gray-900 font-semibold">
                  Download
                </span>
              </button>
            </div>
          </div>

          <div class="py-4 md:py-6 w-full columns-1 ">
            <div id="photo" class="mb-4 rounded2 flex flex-col justify-center items-center" style="background-color: {{ $bgColor }}">
              @if($quote)
              <div class="flex flex-col flex-grow2 justify-center items-center py-2 mt-6 lg:py-6 md:py-6 px-12 md:px-20 min-h-96">
                <p id="myText" class="leading-tight md:leading-snug text-[{{ $fontColor }}] text-{{ $fontAlign }} text-{{ $fontSize }} md:text-{{ $fontSize }}  font-medium transition" style="font-family: {{ $fontFamily }}; color: {{ $fontColor }}">
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
              <div class="@if(Auth::check()){{ 'hidden' }}@else{{ 'flex' }}@endif px-6 pb-6 w-full justify-start">
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
                  <div class="py-0.5 px-2.5 bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                    <div class="truncate text-sm text-black font-semibold capitalize">
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