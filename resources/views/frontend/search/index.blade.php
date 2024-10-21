@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen pt-162 h-full bg-white">

    <div class="max-w-5xl mx-auto">

       
        <div class="px-6 py-2 md:py-2 mb-5 min-h-[100px]">
            <div class="grid grid-cols-1">
                <div class="flex flex-col space-y-4">
                    <div class="flex items-center space-x-2">
                        <div><span class="text-lg md:text-2xl text-black font-semibold">Search:</span></div><span class="text-lg md:text-2xl text-black font-bold uppercase">{{ $search }}</span>
                    </div>
                     <!-- Tags -->
                     @if($tags->count() > 0)
                    <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12 items-center">
                        @foreach($tags as $t)
                        <a href="{{ url('quotes/tag/' . $t->slug) }}">
                            <div class="mr-1.5 mt-1 mb-1 py-1.5 px-3 text-sm bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">{{ $t->name }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                     <!-- End Tags -->
                     <!-- author -->
                     @if($people->count() > 0)
                    <div class="px-6 py-5 mb-5 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            @foreach($people as $alpha => $person)
                            <div class="flex flex-col space-y-2">
                                <div><span class="text-lg font-semibold uppercase">{{ $alpha }}</span></div>
                                <div class="flex flex-col justify-left mx-auto w-full md:w-12/12 items-center2">
                                    @foreach($person as $p)
                                    <a href="{{ url('people/'. $p->slug) }}">
                                        <div class="py-1.5 px-3 text-sm flex text-slate-900 gap-x-1 hover:text-[#FF6D42] transition cursor-pointer">
                                            <div class="truncate text-xs font-semibold capitalize">{{ $p->name }}</div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endif
                    <!-- end author -->
                    <!-- quotes -->
                    @if($quotes->count() > 0)
                    <div class="px-6 py-2 mb-5">
                        <div>
                            <div class="py-10 ">
                                <ul class="list-disc space-y-2">
                                    @foreach($quotes as $q)
                                    <li>
                                        <a class="flex2 items-center leading-tight" href="{{ url('quotes/' . $q->id) }}">
                                            <p class="leading-tight">"{!! $q->words !!}" <span class="italic">- {{ $q->author }}</span></p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end quotes -->
                    
                </div>
            </div>
        </div>

    </div>
</main>



@endsection