<div class="mx-auto w-full2 relative lg:w-1/2 flex flex-col space-y-3 px-3 md:px-6 lg:px-0 py-0 md:py-4 justify-center items-center bg-[#f5f7f9]">
    <div class="flex flex-row justify-between pt-4 mx-auto w-full md:w-12/12 space-x-6 items-center">
        <a href="/" class="flex space-x-1 items-center hover:opacity-80">
            <span class="text-lg md:text-2xl font-bold text-black">
            Showcase
            </span>
        </a>
    </div>

    <div class="relative flex flex-row mx-auto w-full md:w-12/12 justify-between items-center">
        <div class="mb-[1em] flex flex-row overflow-x-auto scroll-smooth custom-scrollbar">
            @php 
                $i = 1;
            @endphp
            @foreach($fontFamily as $f)
            
            @if($i++ == 15)
                @break
            @endif
            <div class="transition-all duration-150 flex mr-[.5em] ">
                <div class="flex w-[330px] md:w-[480px] p-2 justify-center">
                    <div 
                        class="mb-42 rounded border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in"
                        style="background-color: {{ $f['bgColor'] }}"      
                    >
                        <div class="flex-grow py-2 mt-6 lg:py-4 md:py-4 px-11 md:px-20">
                           
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

    <div class="flex flex-row justify-between mx-auto w-full md:w-12/12 space-x-6 items-center pb-7">
        <a href="{{ url('/quotes/' . $id . '/showcase') }}" class="flex rounded px-2 py-1 items-center bg-blue-100 hover:bg-blue-200">
            <span class=" font-semibold text-xs md:text-base text-[#002f6c]">
                All showcase
            </span>
        </a>
    </div>
</div>