@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen pt-162 h-full bg-white">

    <div class="max-w-5xl mx-auto">
            
        @include('frontend.components._search')

        <!-- Tags -->
        <div class="flex flex-col w-full mt-2 px-6 py-1 " :class="showMore ? 'duration-500 ease-in-out' : ''" x-data="{ showMore: false }"> 
            <div class="flex items-center pt-3 mb-1 gap-x-2 gap-y-2 pb-2 transform transition-all duration-1000 ease-in-out" :class="showMore ? 'flex-wrap' : 'overflow-x-auto scroll-smooth custom-scrollbar'" x-cloak x-collapse x-collapse.duration.500ms>
                <a href="/quotes">
                    <div class="py-1.5 px-3 text-sm rounded-md flex items-center gap-x-1 transition cursor-pointer border-sky-700 bg-blue-300 text-sky-700">
                        <div class="truncate text-xs font-semibold">All</div>
                    </div>
                </a>
                @foreach($tags as $t)
                <a href="{{ url('quotes/tag/' . $t->slug) }}">
                    <div class="py-1.5 px-3 text-sm bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                        <div class="truncate text-xs font-semibold capitalize">
                            {{ $t->name }}
                        </div>
                    </div>
                </a>
                @endforeach
                <a href="/tags">
                    <div class="py-1.5 px-3 text-sm rounded-md flex items-center gap-x-1 transition cursor-pointer border border-orange-400 bg-orange-400 text-slate-700 hover:bg-orange-500">
                        <div class="truncate text-xs font-semibold">See all</div>
                    </div>
                </a>
            </div>
            <div class="flex  mx-auto justify-center w-11/12">
                <button class="flex items-center px-2 py-1 space-x-1 text-black rounded-md tracking-tight text-[13px] font-medium" @click="showMore = !showMore">
                    <span x-text="showMore ? 'Show less' : 'Show more'"></span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor" class="w-4 h-4" x-show="showMore">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor" class="w-4 h-4" x-show="!showMore">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>

                </button>
            </div>
        </div>

        <!-- End Tags -->

        <div class="my-0 px-6">
            @if (!empty($tag))
            <div class="font-semibold text-black tracking-tight text-lg">tag by: <span class="text-lg md:text-3xl text-black font-semibold md:font-bold uppercase">{{ $tag }}</span></div>
            @else
            <div class="h-0 md:h-10"></div>
            @endif
        </div>

        <div class="px-6 py-2 mb-5 space-y-4">
            <div>

                <div class="py-10  columns-1 md:columns-2 lg:columns-3 ">

                    @foreach($quotes as $q)
                    <a class="mb-4 rounded bg-white border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in" href="{{ url('quotes/' . $q->id) }}">
                        <div class="flex-grow py-2 lg:py-4 md:py-4 px-4">
                            <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                            </svg>
                            <p class="leading-tight md:leading-snug text-black text-center text-base md:text-xl  font-medium group-hover:text-sky-700 transition">
                                {{ $q->words }}
                            </p>
                            <div class=" px-2 py-4 flex justify-end">
                                <button class=" flex justify-between space-x-6 md:space-x-2">
                                    <div class="flex space-x-2 ">
                                        <span class="flex items-center justify-center text-sm text-[#171717BF] font-semibold">
                                            {{ $q->author($q->author_id)->name }}
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>

            {{ $quotes->links() }}

        </div>
    </div>

    @include('frontend.components._subscribe_form')

</main>

@endsection

