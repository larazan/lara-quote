<div class="vs jj ttm vl ou uf na">

    <!-- Loading -->
    <x-loading-indicator />

    <!-- Page header -->
    <div class="je jd jc ii">

        <!-- Left: Title -->
        <div class="ri _y">
            <h1 class="gu teu text-slate-800 font-bold">Tags</h1>
        </div>

        <!-- Right: Actions -->
        <div class="sn am jo az jp ft">


        </div>

    </div>

    <!-- More actions -->
    <div class="je jd jc ii">

        <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12  items-center">
            @foreach($letters as $l)
            <div wire:click="clickLetter('{{ $l }}')" class="flex mr-2 mt-2 justify-center items-center cursor-pointer mb-1.5 w-8 h-8  hover:bg-blue-800 px-2 py-1 border-2  hover:text-white border-gray-900 @if($this->letter == $l){{ 'bg-blue-800 text-white' }}@else{ 'bg-white text-gray-900' }@endif">
                <span class="uppercase font-bold ">{{ $l }}</span>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white bd rc">
        
        <div>
            <div class="flex flex-col space-y-4">
                <div class="flex items-center space-x-2">
                    <div><span class="text-lg md:text-2xl text-black font-semibold">Tags starting with:</span></div><span class="text-lg md:text-2xl text-black font-bold uppercase">{{ $letter }}</span>
                </div>
                <div class="flex flex-wrap justify-left mx-auto w-full md:w-12/12 items-center">
                    @foreach($tags as $t)
                    <div>
                        <div class="mr-1.5 mt-1 mb-1  text-sm  flex items-center justify-between text-slate-900   transition ">
                            <div class="py-1.5 px-2 bg-[#f1f5f9] border border-slate-300 border-r rounded-l-md truncate text-xs font-semibold capitalize">{{ $t->name }}</div>
                            <div wire:click="deleteTag({{ $t->id }})" class="flex items-center h-8 py-1.5 px-1 bg-[#f1f5f9] hover:bg-slate-200 border border-slate-300 border-r rounded-r-md text-xs font-semibold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</div>