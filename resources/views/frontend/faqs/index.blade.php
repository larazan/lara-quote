@extends('frontend.layout')

@section('content')

@include('frontend.components._ads_modal')

<main class="flex bg-white min-h-screen pt-16 md:pt-[100px]">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
                <section class="w-full mx-auto  mt-10 md:mt-10 px-5 ">
                    <h5 class="font-semibold md:font-bold text-2xl text-black md:text-3xl text-center ">Frequently asked questions</h5>
                    <p class="mt-3 font-normal text-lg text-gray-700 text-center ">Browse through the most frequently asked questions.</p>
                    <dl class="w-full mt-6 space-y-6 divide-y divide-gray-200">
                        @foreach($faqs as $faq)
                        <div class="w-full pt-6" x-data="{ open:false }">
                            <dt class="w-full text-lg">
                                <button
                                    class="flex items-start justify-between w-full text-left text-gray-400"
                                    id="headlessui-disclosure-button-11"
                                    type="button"
                                    aria-expanded="true"
                                    aria-controls="headlessui-disclosure-panel-12"
                                    @click="open = !open"
                                >
                                    <span class="font-medium text-gray-900">{{ $faq->question }}</span>
                                    <span class="flex items-center ml-6 h-7">
                                    <span class="text-primary font-normal text-2xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                            <path x-show="!open"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                    </span>
                                </button>
                            </dt>
                            
                            <dd class="pr-12 mt-2" x-show="open" id="headlessui-disclosure-panel-12" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-6"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-6"
                            >
                                <p class="text-base text-gray-700">
                                    <div>
                                    {{ $faq->answer }}
                                    </div>
                                </p>
                            </dd>
                        </div>
                        @endforeach
                        
                    </dl>

                </section>
                
                @include('frontend.components._random_quote')

            </div>

            @include('frontend.components._subscribe_form')

        </div>
    </div>
</main>

@endsection