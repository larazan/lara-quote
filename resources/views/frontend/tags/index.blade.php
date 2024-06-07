@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen2 pt-162 h-full bg-white">
    <div class="max-w-5xl mx-auto">
        
        @include('frontend.components._search')

        <div class="px-6 py-2 mb-5 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                @foreach($topics as $alpha => $tags)
                <div class="flex flex-col space-y-2">
                    <div><span class="text-lg font-semibold uppercase">{{ $alpha }}</span></div>
                    <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12 items-center">
                        @foreach($tags as $t)
                        <a href="{{ url('tags/' . $t->slug) }}">
                            <div class="mr-1 mt-1 mb-1 py-1.5 px-3 text-sm bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">{{ $t->name }}</div>
                            </div>
                        </a>
                        @endforeach
                        
                        <a href="{{ url('tags/' . $alpha) }}">
                            <div class="mr-1 mt-1 mb-1 py-1.5 px-3 text-sm bg-orange-400 border border-orange-400 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-orange-500 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">More</div>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach        
            
            </div>
        </div>
    </div>

    @include('frontend.components._subscribe_form')

</main>

@endsection