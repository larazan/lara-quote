@extends('frontend.layout')

@section('content')


<main class="flex bg-white min-h-screen pt-16 md:pt-[100px]">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
                <section class="w-full mx-auto  mt-10 md:mt-10 px-5 ">
                    <h5 class="font-semibold md:font-bold text-2xl text-black md:text-3xl text-center ">Frequently asked questions</h5>
                    <p class="mt-3 font-normal text-lg text-gray-700 text-center ">Browse through the most frequently asked questions.</p>
                    <dl class="w-full mt-6 space-y-6 divide-y divide-gray-200">
                        @foreach($faqs as $faq)
                        <div class="w-full pt-6" x-data="{ open:false }">
                            <dt class="w-full text-lg">
                                <button
                                    class="flex items-start justify-between w-full text-left text-gray-400"
                                    id="headlessui-disclosure-button-11"
                                    type="button"
                                    aria-expanded="true"
                                    aria-controls="headlessui-disclosure-panel-12"
                                    @click="open = !open"
                                >
                                    <span class="font-medium text-gray-900">{{ $faq->question }}</span>
                                    <span class="flex items-center ml-6 h-7">
                                    <span class="text-primary font-normal text-2xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                            <path x-show="!open"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                    </span>
                                </button>
                            </dt>
                            
                            <dd class="pr-12 mt-2" x-show="open" id="headlessui-disclosure-panel-12" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-6"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-6"
                            >
                                <p class="text-base text-gray-700">
                                    <div>
                                    {{ $faq->answer }}
                                    </div>
                                </p>
                            </dd>
                        </div>
                        @endforeach
                        
                    </dl>

                </section>
                
                <!-- random quote -->
                @foreach($quote as $q)
                <div class="mt-20 mb-10 flex flex-col items-center px-5 md:px-2">
                    <div class="font-semibold text-2xl md:text-4xl max-w-[900px] text-gray-800 md:leading-tight tracking-wide relative">
                        <p>
                            <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                            </svg>{{ $q->words }}
                        </p>
                    </div>
                    <p class="mt-4 font-medium text-lg text-[#171717BF] max-w-[900px] w-full">– {{ $q->author($q->author_id)->name }}</p>
                </div>
                @endforeach


            </div>

        </div>
    </div>
</main>

<livewire:newsletter-form />

@endsection