<div class="flex w-full pt-1 px-1">
    <div x-data="select()" class="relative w-full z-50" @click.outside="openFont = false" >
        <button @click="toggle" :class="(openFont) && 'ring-blue-600'" class="flex w-full items-center justify-between rounded border-slate-300 bg-white p-2 py-2 md:py-3 ring-1 ring-gray-300">
            <span x-text="(language == '') ? 'Choose font' : language" {{$attributes->wire('model')}}></span>

            <svg x-show="!openFont" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>

            <svg x-show="openFont" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>

        </button>

        <ul class="z-50 absolute2 relative mt-1 w-full rounded bg-gray-50 ring-1 ring-gray-300" x-show="openFont">
            @foreach($fonts as $f)
            <li class="cursor-pointer select-none p-2 hover:bg-gray-200" @click="setLanguage('{{ $f }}')" style="font-family: {{ $f }}">{{ $f }}</li>
            @endforeach
        </ul>
    </div>
</div>

<script>
function select() {
    return {
      openFont: false,
      language: @entangle($attributes->wire('model')),

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