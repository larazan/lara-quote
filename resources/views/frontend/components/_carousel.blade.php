
<div class="mb-10">
    <div class="max-w-4xl mx-auto relative" x-data="slider()"
    x-init="loop()"
    >
        <template x-for="slide in slides" :key="slide.id">
            <div x-show="activeSlide === slide.id" class="p-2 h-full flex items-center bg-white">
                <div class="mt-2 mb-10 flex flex-col items-center px-0 md:px-0">
                <div class="font-semibold text-2xl md:text-4xl max-w-[900px] text-gray-800 md:leading-tight tracking-wide relative">
                    <span>
                        <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                        </svg>
                    </span>
                    <p x-text="slide.body"></p>
                </div>
                <p class="mt-4 font-medium text-lg text-[#171717BF] max-w-[900px] w-full poppins-medium">– <span x-text="slide.author"></span></p>
            </div>
            </div>
        </template>

        <!-- next/prev -->
        <div class="absolute inset-0 flex">
            <div class="flex items-center justify-start w-1/2">
                <button
                    x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                    class="bg-slate-100 text-slate-500 hover:bg-blue-500 hover:text-white transition font-bold rounded-full w-10 h-10 md:w-12 md:h-12 shadow flex justify-center items-center -ml-7 md:-ml-16">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <button
                    x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="bg-slate-100 text-slate-500 hover:bg-blue-500 hover:text-white transition font-bold rounded-full w-10 h-10 md:w-12 md:h-12 shadow flex justify-center items-center -mr-7 md:-mr-16">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- button -->
        <div class="absolute w-full flex items-center justify-center px-4">
            <template x-for="slide in slides" :key="slide.id">
                <button
                    class="flex-1 w-4 h-2 mt-4 mx-2 mb-2 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-slate-600 hover:shadow-lg"
                    :class="{
                        'bg-blue-600' : activeSlide === slide.id,
                        'bg-slate-300' : activeSlide !== slide.id,
                    }"
                    x-on:click="activeSlide=slide.id"></button>
            </template>
        </div>

    </div>
</div>

<script>
    function slider() {
        return {
            activeSlide: 1,
            slides: @json($quotes),
            slided: [
                {id: 1, title: 'Hello 1', body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'},    
                {id: 2, title: 'Hello 2', body: 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam'},    
                {id: 3, title: 'Hello 3', body: 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos'},  
                {id: 4, title: 'Hello 4', body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'},    
                {id: 5, title: 'Hello 5', body: 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam'},   
            ],
            loop(){
                setInterval(() => {this.activeSlide = this.activeSlide === 8 ? 1 : this.activeSlide + 1}, 4000)
            }
        }
    }
</script>