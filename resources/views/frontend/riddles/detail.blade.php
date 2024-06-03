@extends('frontend.layout')

@section('content')

<main class="w-full h-screen mb-[30px] md:mb-[60px]">
        <div class="h-[0px] md:h-[66px]"></div>
        <div class="max-w-screen-5xl mx-auto">
          <div class="lg:flex p-0 w-full">
            <div class="relative mx-auto w-full lg:w-[calc(100vh-200px)]2 lg:w-7/12 bg-[#0074d9]  h-[calc(100vh-66px)] min-h-screen pt-16 md:pt-[10px]">
              <div class="flex flex-col w-10/12 mx-auto items-center bg-[#0074d9] py-10 mb-4">
                <h1 class="relative mx-0 md:mx-auto text-2xl md:text-5xl md:leading-[60px] max-w-3xl m-auto text-white font-semibold  mt-4 sm:mt-6 mb-5 sm:mb-0">
                  A grandmother, two mothers, and two daughters went to a
                  baseball game together and bought one ticket each. How many
                  tickets did they buy in total?
                </h1>

                <div class="flex w-full max-w-3xl m-auto text-left mx-3 text-2xl md:text-5xl  md:leading-[60px]  text-[#fdfc3b] font-semibold text-center2 mt-4 sm:mt-6 mb-5 sm:mb-0">
                  <span>Three tickets </span>
                </div>
              </div>
              
              @include('frontend.components._nav')

            </div>
          </div>
        </div>
      </main>

@endsection