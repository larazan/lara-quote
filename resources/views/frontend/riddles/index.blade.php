@extends('frontend.layout')

@section('content')

<main class="pt-[50px] bg-white md:pt-[80px] h-screen2">
        <div class="py-20">
          <div class="mx-auto max-w-7xl px-6">
            <div class="mx-auto max-w-2xl sm:text-center">
              <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Fun Riddles
              </h2>
              <p class="mt-6 md:text-lg leading-tight md:leading-8 text-gray-600">
                Riddles are word games. They are questions with surprising but
                logical answers which test our ability to think carefully.
                Riddles often make us laugh when we hear their solutions. They
                try to trick us, but they also entertain and delight us. Because
                of this, riddles can be fun tools to warm up our brains before
                we start a mentally demanding task.
              </p>
            </div>

            <div class="flex mx-auto w-10/12">
              <a href="{{ url('riddles/random') }}" class="inline-flex items-center capitalize justify-center text-lg md:text-2xl font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-sky-700 text-white hover:bg-sky-700/80  py-4 rounded-md px-3 mt-10 w-full">
                Take test now
                </a>
            </div>
          </div>
        </div>

        @include('frontend.components._subscribe_form')
      
    </main>

@endsection