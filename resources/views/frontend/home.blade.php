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

            @foreach($quote as $q)
            <div class="mt-2 mb-10 flex flex-col items-center px-0 md:px-0">
                <div class="font-semibold text-2xl md:text-4xl max-w-[900px] text-gray-800 md:leading-tight tracking-wide relative">
                    <p>
                        <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                        </svg>{{ $q->words }}
                    </p>
                </div>
                <p class="mt-4 font-medium text-lg text-[#171717BF] max-w-[900px] w-full">– {{ $q->author($q->author_id)->name }}</p>
            </div>
            @endforeach

                <div class="flex py-8 md:py-20 relative">
                    <div class="flex flex-col gap-y-24 md:gap-y-32 mx-auto max-w-6xl">
                        
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image md:order-2 my-auto">
                                    <img  class="rounded border mx-auto" src="{{ url('frontend/img/quote5.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Find Quotes in Seconds
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
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
                                    <img  class="rounded border  mx-auto" src="{{ url('frontend/img/setting.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Setting for your own needs
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
                                                    We provide a tools for setting for your needs
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    You can choose various template for social media content. Make change a background, color, choose font family and font size.  
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
                                    <img  class="rounded-xl md:w-3/4 mx-auto" src="{{ url('frontend/img/quote-2.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Easy Access to Inspirational Quotes
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
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
                                <span class="text-xl text-black">Quotes</span>
                            </p>
                        </div>
                        <div class="px-6 py-8 md:pt-16 md:pb-24 md:text-center md:w-1/2" data-controller="animated-number">
                            <p>
                                <b class="block font-heading text-5xl md:text-6xl text-black leading-snug mt-1 md:my-4" data-target="animated-number.stat" data-stat="151284">
                                {{ number_format($personCount, 0) }}
                                </b>
                                <span class="text-xl text-black">People</span>
                            </p>
                        </div>
                    </div>
                </section>

            </div>


        </div>
    </div>
</div>

<livewire:newsletter-form />

@endsection