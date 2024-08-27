<div class="mx-auto w-full2 relative lg:w-full flex flex-col space-y-3 px-3 md:px-6 lg:px-0 py-0 md:py-4 justify-center items-center bg-[#f5f7f9]">
    <div class="flex flex-row justify-between pt-4 mx-auto w-full md:w-12/12 lg:w-11/12 space-x-6 items-end">
        <div class="flex space-x-1 items-center2 hover:opacity-80">
            <span class="text-lg md:text-2xl font-bold text-black">
            Showcase
            </span>
        </div>
        <a href="{{ url('/quotes/' . $id . '/showcase') }}" class="flex space-x-1 items-center hover:underline underline-offset-2">
            <span class="text-sm md:text-md font-bold text-black">Show all</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-2 md:size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </a>
    </div>

    <div class="relative flex flex-row mx-auto w-full md:w-12/12 lg:w-11/12 justify-between items-center">
        <div class="mb-[1em] flex flex-row overflow-x-auto scroll-smooth custom-scrollbar pb-3">
            @php 
                $i = 0;
            @endphp
            @foreach($fontFamily as $f)
            
            @if($i++ == 15)
                @break
            @endif
            <div class="transition-all duration-150 flex mr-[.5em] ">
                <div class="flex w-[280px] md:w-[380px] p-2 justify-center">
                    <div 
                        class="mb-42 rounded border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in"
                        style="background-color: {{ $f['bgColor'] }}"      
                    >
                        <div class="flex flex-col items-center justify-center  py-2 mt-6 lg:py-4 md:py-4 px-11 md:px-20">
                           
                           <p 
                               class="leading-tight md:leading-snug text-[{{ $f['fontColor'] }}] text-center text-lg md:text-2xl  font-medium transition"
                               style="font-family: {{ $f['font'] }}; color: {{ $f['fontColor'] }}"
                           >
                               {{ $quote->words }}
                           </p>
                           <div class=" px-2 py-4 flex justify-center">
                               
                               <button class=" flex justify-between space-x-6 md:space-x-2">
                                   <div class="flex space-x-2" style="color: {{ $f['fontColor'] }}">
                                       <span class="flex items-center justify-center text-sm font-semibold">
                                           - {{ $author }}
                                       </span>
                                   </div>
                               </button>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>