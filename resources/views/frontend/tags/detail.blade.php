@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen2 pt-162 h-full bg-white">
    <div class="max-w-5xl mx-auto">
        <div class="px-6 lg:hidden lg:mb-0 block">
            <!--  Search -->
        </div>
        <div class="px-6 py-2 mt-2 mb-5 min-h-[300px]">
            <div class="grid grid-cols-1">
                <div class="flex flex-col space-y-4">
                    <div class="flex items-center space-x-2">
                        <div><span class="text-lg md:text-2xl text-black font-semibold">Tags starting with:</span></div><span class="text-lg md:text-2xl text-black font-bold uppercase">{{ $letter }}</span>
                    </div>
                    <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12 items-center">
                        @foreach($tags as $t)
                        <a href="{{ url('tags/' . $t->slug) }}">
                            <div class="mr-1.5 mt-1 mb-1 py-1.5 px-3 text-sm bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">{{ $t->name }}</div>
                            </div>
                        </a>
                        @endforeach
                       
                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('frontend.components._subscribe_form')

</main>

@endsection