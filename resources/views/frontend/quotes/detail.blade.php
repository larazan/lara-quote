@extends('frontend.layout')

@section('content')

<main class="flex flex-col bg-white min-h-screen pt-16 md:pt-[100px]">

    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">

                <!-- Adv -->

                <section class="w-full mx-auto  mt-10 md:mt-10 px-5 pb-10">
                    <div class="flex justify-between">
                        <div class="flex justify-end space-x-2">
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
                        <div class="flex space-x-2">
                            <button class="bg-[#f6f8fa] hover:bg-gray-200 border border-gray-300 px-2 py-1 font-extralight text-white inline-flex items-center space-x-1 rounded " title="Like Quote">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 text-gray-500">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>

                                <span class="text-sm text-gray-900 font-semibold">
                                    Likes
                                </span>
                            </button>
                            <button class="bg-[#f6f8fa] hover:bg-gray-200 border border-gray-300 px-2 py-1.5 font-extralight text-white inline-flex items-center space-x-1 rounded " title="Copy to clipboard">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 text-gray-500">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>

                                <span class="text-sm text-gray-900 font-semibold">
                                    Copy
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="py-4 md:py-6 w-full columns-1 ">
                        <div class="mb-4 rounded bg-white border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in">
                            <div class="flex-grow py-2 lg:py-4 md:py-4 px-4">
                                <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                                </svg>
                                <p class="leading-tight md:leading-snug text-black text-center text-xl md:text-xl lg:text-2xl">
                                    {{ $quote->words }}
                                </p>
                                <div class=" px-2 py-4 flex justify-end">
                                    <button class=" flex justify-between space-x-6 md:space-x-2">
                                        <div class="flex space-x-2 ">
                                            <span class="flex items-center justify-center text-sm text-[#171717BF] font-semibold">
                                                {{ $author }}
                                            </span>
                                        </div>
                                    </button>
                                </div>
                            </div>
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

            @include('frontend.components._subscribe_form')

        </div>
    </div>
</main>

@endsection