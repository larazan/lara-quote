<div x-data="{ showInfo: true }">
<div class="fixed left-0 bottom-0 z-50" x-show="showInfo">
    <div class="fixed2 relative bottom-2 md:bottom-4 left-2 py-4 px-5 rounded-lg bg-green-500 opacity-95 w-full max-w-[calc(100%-68px)] sm:max-w-xs shadow-lg z-50 border-platinum ">
        <button class="absolute flex top-1 right-1 md:top-2 md:right-2 rounded-full bg-white shadow-xl px-1 py-1 md:p-1 cursor-pointer" @click="showInfo = !showInfo">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=3 stroke="currentColor" class="w-5 h-5 text-[#1d494e]">
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="">
            <div class="flex flex-col overflow-hidden px-1 md:px-1 pt-2 ">
                <div class="flex items-center space-x-2">
                    <span class="text-md md:text-lg font-bold text-white leading-2">How to Customize and Download ?</span>
                </div>

                <div class="pt-2 pb-4 text-sm md:text-base text-white leading-tight md:leading-snug">
                    <p class="text-normal text-brand-dark">Select one of showcase design to download and customize it!</p>
                </div>
            </div>
            <div class="hidden flex2 items-center w-full space-x-2">
                <button class="flex w-full rounded py-2 bg-transparent items-center justify-center text-sm text-center border border-[#32e6e2] text-[#32e6e2] font-semibold cursor-pointer hover:opacity-85">
                    Reject All
                </button>
                <button class="flex w-full rounded py-2 bg-[#32e6e2] items-center justify-center text-sm text-center border border-[#32e6e2] text-[#181a1c] font-semibold cursor-pointer hover:opacity-85">
                    Accept All
                </button>
            </div>
        </div>
    </div>
</div>
</div>