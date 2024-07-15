@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ $person->name }}">
<meta name="description" content="{{ $person->bio }}">
<meta name="keywords" content="{{ $person->name }}">
@endpush

@section('content')

<main class="pt-14 bg-white md:pt-[60px] h-full">
    <div class="max-w-5xl mx-auto">
    
    <!-- Adv -->
    
        <div class="bg-[#FFE5DD] py-10 md:mb-4">
        <div class="flex flex-1 px-4 max-w-3xl m-auto items-center justify-between pt-0 mb-2">
      <a href="{{ url('/people') }}" class="items-center text-base text-gray-900 hover:underline flex">
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
        </svg> <span class="text-gray-900 ml-1 hover:text-gray-900">Back to people</span>
      </a>
    </div>
            <div class="flex items-center justify-center sm:hidden">
                <div>
                    <div class="border-white rounded-full border-3  roundedShadow">
                        <img alt="" aria-hidden="true" src="{{ Avatar::create($person->name)->toBase64() }}" class="w-[45px] h-[45px] rounded-full" />    
                    </div>
                </div>
                <p class="text-sm font-semibold text-[#404040] ml-2">
                {{ $person->name }}
                </p>
            </div>
            <div class="mt-4 sm:mt-6 text-center text-[#565656] flex justify-center items-center sm:divide-x relative sm:space-x-3 divide-[#CACACA]">
                <div class="items-center justify-center hidden font-medium sm:flex">
                    <div>
                        <div class="border-white rounded-full border-3 hidden text-[20px] leading-9 text-center  left-11 -top-6 roundedShadow sm:block">
                            <img alt="" aria-hidden="true" src="{{ Avatar::create($person->name)->toBase64() }}" class="w-[60px] h-[60px] rounded-full" />
                        </div>
                    </div>
                    <p class="text-2xl font-semibold text-[#404040] sm:ml-5 hidden sm:block">
                        {{ $person->name }}
                    </p>
                </div>
            </div>
            <h1 class="relative mx-3 md:mx-auto leading-tight text-md md:text-lg text-black md:leading-normal max-w-3xl m-auto font-semibold text-center mt-4 sm:mt-6 mb-5 sm:mb-0">
                Augusta Ada King, Countess of Lovelace (née Byron; 10 December
                1815 – 27 November 1852) was an English mathematician and writer,
                chiefly known for her work on Charles Babbage&apos;s proposed
                mechanical general-purpose computer, the Analytical Engine.
            </h1>
        </div>

        <div class="p-6 space-y-4 bg-white">
            <div>
            @if ($quotes->count() > 0)
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
                @else
                    <div class="flex items-center justify-center mx-auto w-full ">
                        <span class="font-semibold text-md text-red-500">No record found!</span>
                    </div>
                    @endif
            </div>

            

        </div>
    </div>

</main>

<livewire:newsletter-form />

@endsection