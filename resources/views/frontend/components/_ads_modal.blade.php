<div x-data="{ showModal: true }"  @keydown.escape="showModal = false">
    <div class="fixed inset-0 z-50 overflow-hidden flex items-start top-[10%] md:top-[10%] mb-4 justify-center transform px-4 sm:px-6 " x-show="showModal">
        <div class="relative bg-white overflow-auto max-w-3xl w-full max-h-full rounded2 shadow-lg" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <section class="overflow-hidden  shadow-2xl md:grid md:grid-cols-1">
                <img alt="Trainer" src="{{ url('frontend/img/promo1.jpeg') }}" class="h-full md:h-64 w-full object-cover" />

                <button class="absolute flex top-1 right-1 md:top-2 md:right-2 rounded-full bg-white shadow-xl px-1 py-1 md:p-2 cursor-pointer" @click="showModal = !showModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=3 stroke="currentColor" class="w-5 h-5 text-[#1d494e]">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                    <p class="text-2xl font-bold uppercase tracking-widest text-gray-900">
                        THE BIGGEST DEAL OF THE YEAR
                    </p>

                    <h2 class="mt-6 font-black">
                        <span class="text-2xl text-[#02574d] md:text-3xl lg:text-6xl">
                            Get 25% OFF All products
                        </span>
                    </h2>

                    <a class="mt-8 inline-block w-full bg-[#f8e71c] hover:opacity-80 shadow py-4 text-md font-bold uppercase tracking-widest text-gray-900" href="">
                        Get Discount
                    </a>

                    <p class="mt-8 text-xs font-medium uppercase text-gray-400">
                        Offer valid until 24th March, 2024 *
                    </p>
                </div>
            </section>
        </div>
    </div>
    <div class="opacity-50 fixed inset-0 z-40 bg-black" x-show="showModal"></div>