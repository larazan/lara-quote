<button wire:click="like" class="bg-[#f6f8fa] hover:bg-gray-200 border border-gray-300 px-2 py-1 font-extralight text-white inline-flex items-center space-x-1 rounded {{ $quote->isLiked() ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0" title="Like Quote">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 text-gray-500">
        <path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
    </svg>
    <span class="font-medium text-gray-900">{{ $count }}</span>
    <span class="text-sm text-gray-900 font-semibold">
        Likes
    </span>
</button>