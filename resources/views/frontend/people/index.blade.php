@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }} People">
<meta name="description" content="alot author, leader, spokesperon, who inspiring the world">
<meta name="keywords" content="author, people">
@endpush

@section('content')

<main class="pt-[60px] bg-white md:pt-[80px] h-full">
    <div class="max-w-5xl mx-auto pb-10">

        

        <div class="p-6 space-y-4">
            <div>
                <span class="font-semibold text-black">
                    Find a Author by its first letter:
                </span>
                <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12  items-center">
                    @foreach($letters as $l)
                    <a 
                        href="{{ url('people/letter/' . $l) }}" 
                        class="flex mr-2 mt-2 justify-center items-center mb-1.5 w-8 h-8  hover:bg-blue-800 px-2 py-1 border-2  hover:text-white border-gray-900 @if(Request::segment(3) == $l){{ 'bg-blue-800 text-white' }}@else{ 'bg-white text-gray-900' }@endif"
                    
                    >
                        <span class="uppercase font-bold ">{{ $l }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="my-4">
                @if (!empty($letter))
                <span class="text-lg md:text-3xl text-black font-semibold md:font-bold uppercase">{{ $letter }}</span>
                @else
                <div class="h-10"></div>
                @endif
            </div>

            <div class="bg-white">
                @if($people->count() > 0)
                <section class="grid w-full grid-cols-3 md:grid-cols-5 gap-2 md:gap-4 xl:grid-cols-4 xl:gap-4">
                    @foreach($people as $p)
                    <div class="transition-all duration-150 flex mr-[1em] mb-[1em] hover:scale-110">
                        <div class="flex  w-[90px] md:w-[130px]">
                            <div class=" flex flex-col items-center2 mx-auto w-full transition duration-500 ease-in-out">
                                <a href="{{ url('people/'. $p->slug) }}" class="flex justify-center px-1 w-[90px] h-[90px] md:w-[130px] md:h-[130px]">
                                    <img class="w-[60px] h-[60px] md:w-[100px] md:h-[100px] rounded-full shadow" src="{{ Avatar::create($p->name)->toBase64() }}" width="32" height="32" alt="{{ $p->name }}" />
                                </a>
                                <div class="px-3 py-0 flex flex-col justify-center text-center leading-tight">
                                    <h3 class="my-[0.25em] mx-[0em] overflow-hidden break-words text-sm md:text-md text-black leading-tight md:leading-tight font-semibold capitalize">
                                        <a href="{{ url('people/'. $p->author_id) }}">{{ $p->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>
                @else
                <div class="flex items-center justify-center mx-auto w-full ">
                    <span class="font-semibold text-md text-red-500">No record found!</span>
                </div>
            @endif

            </div>

            {{ $people->links() }}
           

        </div>
    </div>

</main>

<livewire:newsletter-form />

@endsection