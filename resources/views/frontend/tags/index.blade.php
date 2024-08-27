@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }} Topics">
<meta name="description" content="alot topics for quotes ready to search">
<meta name="keywords" content="topic, tags, quotes, author">
@endpush

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen2 pt-162 h-full bg-white">
    <div class="max-w-5xl mx-auto">
        
        

        <div class="px-6 py-5 md:py-12 mb-5 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                @foreach($topics as $alpha => $tags)
                <div class="flex flex-col space-y-2">
                    <div><span class="text-lg font-semibold uppercase">{{ $alpha }}</span></div>
                    <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12 items-center">
                        @php 
                            $i = 1;
                        @endphp
                        @foreach($tags as $t)
                        <a href="{{ url('quotes/tag/' . $t->slug) }}">
                            <div class="mr-1 mt-1 mb-1 py-1.5 px-3 text-sm bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">{{ $t->name }}</div>
                            </div>
                        </a>
                            @if($i++ == 15)
                                @break
                            @endif
                        @endforeach
                        @if($tags->count() > 15)
                        <a href="{{ url('tags/' . $alpha) }}">
                            <div class="mr-1 mt-1 mb-1 py-1.5 px-3 text-sm bg-orange-400 border border-orange-400 rounded-md flex items-center text-slate-900 gap-x-1 hover:bg-orange-500 transition cursor-pointer">
                                <div class="truncate text-xs font-semibold capitalize">More</div>
                            </div>
                        </a>
                        @endif
                    </div>

                </div>
                @endforeach        
            
            </div>
        </div>
    </div>

</main>

<livewire:newsletter-form />

@endsection