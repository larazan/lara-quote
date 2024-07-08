<div class="mx-auto w-full2 relative lg:w-full flex flex-col space-y-3 px-3 md:px-6 lg:px-0 py-0 md:py-4 justify-center items-center bg-[#f5f7f9]">
    <div class="flex flex-row justify-between pt-4 mx-auto w-full md:w-12/12 lg:w-11/12 space-x-6 items-center">
        <a href="/" class="flex space-x-1 items-center hover:opacity-80">
            <span class="text-lg md:text-2xl font-bold text-black">
            Related Article
            </span>
        </a>
    </div>

    <div class="relative flex flex-row mx-auto w-full md:w-12/12 lg:w-11/12 justify-between items-center">
        <div class="mb-[1em] flex flex-row overflow-x-auto scroll-smooth custom-scrollbar pb-3">
           
            @foreach($articles as $a)
            <div class="transition-all duration-150 flex mr-[.5em] ">
                <div class="flex w-[230px] md:w-[280px] p-5 justify-center bg-white shadow hover:shadow-lg">
                    <div class=" bg-white  flex ">
                        <a href="/" class="flex flex-col space-y-3 justify-center items-center">
                        <div class="">
                <h2 class="pb-4 text-left">
                  <a
                    href="{{ url('/articles/' . $a->slug) }}"
                    class="text-lg md:text-2xl leading-tight font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    {{ $a->title }}
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-left">
                  {{ $a->excerpt() }}
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ Avatar::create($a->user->first_name.' '.$a->user->last_name)->toBase64() }}"
                        alt="{{ $a->user->first_name }} {{ $a->user->last_name }}"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                      {{ $a->user->first_name }} {{ $a->user->last_name }}
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2021-29-00">{{ $a->created_at->diffForHumans() }}</time>
                        <span> · </span>
                        <span>{{ $a->readTime() }} min read</span>
                      </div>
                    </div>
                  </div>
                </div>
</div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>