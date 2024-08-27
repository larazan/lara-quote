<main class="flex flex-col bg-white min-h-full w-full pt-16 md:pt-[100px]">

  @include('frontend.components._setting')

  <div class="flex flex-row ">
    <div class="flex flex-1 flex-col items-center justify-center relative">
      <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
        <!-- Adv -->

        <section class="w-full mx-auto  mt-10 md:mt-10 px-5 pb-10">

          <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 justify-between">
            <div class="">
              {!! $shareComponent !!}
            </div>
            <div class="flex2 hidden justify-end space-x-2">
              <button>
                <div class="flex rounded py-1.5 px-2 bg-[#1877f2] hover:bg-[#1877f2] fill-[#1877f2] hover:fill-white  items-center justify-between md:space-x-1 hover:shadow-blue-500/50 ">
                  <span class="text-white text-sm font-semibold hidden md:block">
                    Facebook
                  </span>
                  <svg class="w-5 h-5 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd"></path>
                  </svg>
                </div>
              </button>
              <button>
                <div class="flex rounded py-1.5 px-2 bg-[#1d9bf0] hover:bg-[#1d9bf0] fill-[#1d9bf0] hover:fill-white  items-center justify-between md:space-x-1 hover:shadow-sky-500/50">
                  <span class="text-white text-sm font-semibold hidden md:block">
                    Twitter
                  </span>
                  <svg class="w-5 h-5 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                  </svg>
                </div>
              </button>
              <button>
                <div class="flex rounded  py-1.5 px-2  bg-gray-800 hover:bg-black fill-[#1d9bf0] hover:fill-white  items-center justify-between space-x-1 hover:shadow-sky-500/50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor" class="w-5 h-5 md:w-4 md:h-4 text-white">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                  </svg>

                  <span class="text-white text-sm font-semibold hidden md:block">
                    Copy link
                  </span>
                </div>
              </button>
            </div>
            <div class="flex space-x-2 justify-end md:justify-normal">
              <button
                @click="filterOpen = true" class="flex justify-between shadow-sm text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-300  rounded-md font-medium px-3 py-2 md:space-x-2 items-center">
                <span class="hidden md:inline-block font-semibold">Setting</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 rotate-90">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                  </svg>
                </span>
              </button>
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
            <div id="photo" class="mb-4 rounded2 flex flex-col justify-center items-center" style="background-color: {{ $styles[$type]['bgColor'] }}">
              @if($quote)
              <div class="flex-grow py-2 mt-6 lg:py-6 md:py-6 px-12 md:px-20">
                <p id="myText" class="leading-tight md:leading-snug text-[{{ $styles[$type]['fontColor'] }}] text-center text-3xl md:text-4xl  font-medium transition" style="font-family: {{ $styles[$type]['font'] }}; color: {{ $styles[$type]['fontColor'] }}">
                  {{ $quote->words }}
                </p>
                <div class=" px-2 py-4 flex flex-col @if(Auth::check()){{ 'pb-8' }}@else{{ 'pb-0' }}@endif  justify-center">
                  <div class="flex w-full justify-end">
                    <div class="flex justify-end" style="color: {{ $styles[$type]['fontColor'] }}">
                      <span class="flex items-center justify-center text-md font-semibold">
                        - {{ $author }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="@if(Auth::check()){{ 'hidden' }}@else{{ 'flex' }}@endif px-4 pb-4 w-full justify-start">
                <img src="/frontend/img/logo.png" alt="logo" class=" md:h-8" />
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