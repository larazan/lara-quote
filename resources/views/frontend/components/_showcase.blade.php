<div class="mx-auto w-full2 relative lg:w-1/2 flex flex-col space-y-3 px-3 md:px-6 lg:px-0 py-0 md:py-4 justify-center items-center bg-[#f5f7f9]">
    <div class="flex flex-row justify-between mx-auto w-full md:w-12/12 space-x-6 items-center">
        <a href="/" class="flex space-x-1 items-center hover:opacity-80">
            <span class="text-lg md:text-2xl font-bold text-[#002f6c]">
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
                <div class="flex w-[130px] md:w-[380px] p-2 justify-center">
                    <div class="mb-42 rounded bg-white border group flex flex-col overflow-hidden justify-center shadow-md items-center cursor-zoom-in">
                        <div class="flex-grow py-2 lg:py-4 md:py-4 px-4">
                            <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                            </svg>
                            <p
                                id="myText" 
                                class="leading-tight md:leading-snug text-black text-center text-xl md:text-xl lg:text-2xl"
                                style="font-family: {{ $f }} "
                            >
                                For an entire populace, change, growth, and spontaneity were dangerous. Acting upon a personal desire, whispering a hidden longing, revealing your true feelings - all the human actions we think of as essential to a character - had be censored by the self lest they be punished by the state.
                            </p>
                            <div class=" px-2 py-4 flex justify-end">
                                <button class=" flex justify-between space-x-6 md:space-x-2">
                                    <div class="flex space-x-2 ">
                                        <span class="flex items-center justify-center text-sm text-[#171717BF] font-semibold">
                                        Adam Johnson
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
        <a href="/" class="flex rounded px-2 py-1 items-center bg-blue-100 hover:bg-blue-200">
            <span class=" font-semibold text-xs md:text-base text-[#002f6c]">
                All showcase
            </span>
        </a>
    </div>
</div>