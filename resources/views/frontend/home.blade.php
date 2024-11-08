@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }}">
<meta name="keywords" content="topic, quotes, author">
@endpush

@section('content')

@include('frontend.components._ads_modal')

<div class="flex bg-white min-h-screen pt-[60px] md:pt-[100px]">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            
            <div class="flex flex-1 flex-col pb-18 px-3 md:px-0 max-w-sm md:max-w-2xl">

            @include('frontend.components._carousel')

                <div class="flex py-8 md:py-20 relative">
                    <div class="flex flex-col gap-y-24 md:gap-y-32 mx-auto max-w-6xl">
                        
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image md:order-2 my-auto">
                                    <img  class="rounded border mx-auto" src="{{ url('frontend/img/quote5.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black poppins-bold font-extrabold2 text-3xl md:text-4xl mb-2 text-left">
                                        Find Quotes in Seconds
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md poppins-medium md:text-lg text-gray-700 font-bold mb-1">
                                                   Large Quote Collection 
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    Welcome! Million Quotes is an Quote Database to inspire you daily through uplifting and motivational quotes.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image false my-auto">
                                    <img  class="rounded border  mx-auto" src="{{ url('frontend/img/setting3.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black poppins-bold font-extrabold2 text-3xl md:text-4xl mb-2 text-left">
                                        Customize for your own needs
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md poppins-medium md:text-lg text-gray-700 font-bold mb-1">
                                                    We provide a tools to customize for your needs
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    You can make change a background size, color, choose font family and font size for your social media content.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image md:order-2 my-auto">
                                    <img  class="rounded border  mx-auto" src="{{ url('frontend/img/quote6.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black poppins-bold font-extrabold2 text-3xl md:text-4xl mb-2 text-left">
                                        Easy Access to Inspirational Quotes
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md poppins-medium md:text-lg text-gray-700 font-bold mb-1">
                                                    A Library of Quotes at Your Disposal
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    Our Quote Database like a vast library,
                                                    offering easy access to a wide range of inspirational
                                                    quotes. Whether you&apos;re looking for wisdom, humor,
                                                    or motivation, the database provides an extensive
                                                    collection.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section>
                    <div class="wrap mx-auto flex flex-col bg-white md:flex-row divide-y-2 md:divide-y-0 md:divide-x-2 divide-red">
                        <div class="px-6 py-8 md:pt-16 md:pb-24 md:text-center md:w-1/2" data-controller="animated-number">
                            <p>
                                <b class="block font-heading text-5xl md:text-6xl text-black leading-snug mt-1 md:my-4" data-target="animated-number.stat" data-stat="1310904">
                                    {{ number_format($quotesCount, 0) }}
                                </b>
                                <span class="text-xl text-black poppins-bold">Quotes</span>
                            </p>
                        </div>
                        <div class="px-6 py-8 md:pt-16 md:pb-24 md:text-center md:w-1/2" data-controller="animated-number">
                            <p>
                                <b class="block font-heading text-5xl md:text-6xl text-black leading-snug mt-1 md:my-4" data-target="animated-number.stat" data-stat="151284">
                                {{ number_format($personCount, 0) }}
                                </b>
                                <span class="text-xl text-black poppins-bold">People</span>
                            </p>
                        </div>
                    </div>
                </section>

            </div>


        </div>
    </div>
</div>



@endsection