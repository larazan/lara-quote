@extends('frontend.layout')

@push('meta')
<meta name="description" content="{{ $title }}">
<meta name="keywords" content="{{ $quote->tags }}">
@endpush

@section('content')

<main class="flex flex-col bg-white min-h-full w-full pt-16 md:pt-[100px]">

  <div class="flex flex-row ">
    <div class="flex flex-1 flex-col items-center justify-center relative">
      <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
        <!-- Adv -->

        <section class="w-full mx-auto  mt-10 md:mt-10 px-5 pb-10">

          <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 justify-between">
            <div class="">
              {!! $shareComponent !!}
            </div>
            <div class="flex2 hidden justify-end space-x-2">
              <button>
                <div class="flex rounded py-1.5 px-2 bg-[#1877f2] hover:bg-[#1877f2] fill-[#1877f2] hover:fill-white  items-center justify-between md:space-x-1 hover:shadow-blue-500/50 ">
                  <span class="text-white text-sm font-semibold hidden md:block">
                    Facebook
                  </span>
                  <svg class="w-5 h-5 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd"></path>
                  </svg>
                </div>
              </button>
              <button>
                <div class="flex rounded py-1.5 px-2 bg-[#1d9bf0] hover:bg-[#1d9bf0] fill-[#1d9bf0] hover:fill-white  items-center justify-between md:space-x-1 hover:shadow-sky-500/50">
                  <span class="text-white text-sm font-semibold hidden md:block">
                    Twitter
                  </span>
                  <svg class="w-5 h-5 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                  </svg>
                </div>
              </button>
              <button>
                <div class="flex rounded  py-1.5 px-2  bg-gray-800 hover:bg-black fill-[#1d9bf0] hover:fill-white  items-center justify-between space-x-1 hover:shadow-sky-500/50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor" class="w-5 h-5 md:w-4 md:h-4 text-white">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                  </svg>

                  <span class="text-white text-sm font-semibold hidden md:block">
                    Copy link
                  </span>
                </div>
              </button>
            </div>
            <div class="flex space-x-2 justify-end md:justify-normal">
              <!-- <button class="bg-[#f6f8fa] hover:bg-gray-200 border border-gray-300 px-2 py-1 font-extralight text-white inline-flex items-center space-x-1 rounded " title="Like Quote">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 text-gray-500">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>

                <span class="text-sm text-gray-900 font-semibold">
                  Likes
                </span>
              </button> -->
              <livewire:like />
              <button class="bg-[#f6f8fa] hover:bg-gray-200 border border-gray-300 px-2 py-1.5 font-extralight text-white inline-flex items-center space-x-1 rounded" title="Copy to clipboard" onclick="copyContent()" value="copy">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 text-gray-500">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                </svg>

                <span class="text-sm text-gray-900 font-semibold">
                  Copy
                </span>
              </button>
            </div>
          </div>

          <div class="py-4 md:py-6 w-full columns-1 ">
            <div class="mb-4 rounded bg-white border group flex flex-col overflow-hidden justify-center shadow-md items-center">
              <div class="flex-grow py-2 lg:py-4 md:py-4 px-4">
                <input class="hidden" type="text" id="copy_{{ $quote->id }}" value="{{ $quote->words }}">
                <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.293 16.233c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.743-1.336.234-.46.647-.773.951-1.167.318-.383.752-.638 1.096-.956.337-.333.779-.499 1.13-.733.368-.21.688-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.09.27-.43.08-.887.297-1.397.494-.504.225-1.086.377-1.628.738-.545.345-1.173.634-1.727 1.096-.537.477-1.185.89-1.663 1.496-.522.567-1.038 1.162-1.439 1.84-.464.646-.779 1.355-1.112 2.057-.3.701-.543 1.418-.74 2.115a19.112 19.112 0 0 0-.608 3.859 19.722 19.722 0 0 0 .044 2.766c.024.323.068.636.1.853l.04.266.04-.01a7.125 7.125 0 1 0 6.967-8.616Zm17.417 0c-.353 0-.692.054-1.03.103.11-.367.222-.74.403-1.077.18-.487.462-.91.742-1.336.235-.46.648-.773.952-1.167.318-.383.752-.638 1.095-.956.338-.333.78-.499 1.131-.733.367-.21.687-.444 1.03-.554l.853-.352.75-.312-.768-3.068-.945.228c-.302.076-.671.164-1.091.27-.43.08-.887.297-1.396.494-.502.227-1.087.377-1.628.74-.545.345-1.173.633-1.728 1.096-.536.476-1.184.89-1.662 1.494-.523.567-1.039 1.162-1.44 1.84-.463.646-.778 1.355-1.11 2.057a17.313 17.313 0 0 0-.742 2.115 19.108 19.108 0 0 0-.608 3.859 19.713 19.713 0 0 0 .044 2.766c.024.323.069.636.1.853l.04.266.041-.01a7.126 7.126 0 1 0 6.967-8.616Z" fill="#FF6D42"></path>
                </svg>
                <p id="myText" class="leading-tight md:leading-snug text-black text-center text-xl md:text-xl lg:text-2xl">
                  {{ $quote->words }}
                </p>
                <div class=" px-2 py-4 flex justify-end">
                  <a href="{{ url('people/'. $slug) }}" class=" flex justify-between space-x-6 md:space-x-2">
                    <div class="flex space-x-2 ">
                      <span class="flex items-center justify-center text-sm text-[#171717BF] font-semibold">
                        {{ $author }}
                      </span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap2 w-full items-center space-x-1 px-2 md:px-4 py-2">
              <span class="text-sm md:text-md font-semibold text-gray-600">
                Tags:
              </span>
              <div class="flex flex-wrap gap-x-2 w-full">
                @if(!empty($tags))
                @foreach($tags as $t)
                @php
                $tg = General::toLowerString($t);
                @endphp
                <a href="{{ url('quotes/tag/' . $tg) }}">
                  <div class="py-0.5 px-2.5 bg-[#f1f5f9] border border-slate-300 rounded-md flex items-center gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                    <div class="truncate text-sm text-black font-semibold capitalize">
                      {{ $t }}
                    </div>
                  </div>
                </a>
                @endforeach
                @else
                <div></div>
                @endif

              </div>
            </div>

          </div>
        </section>

      </div>
    </div>
  </div>
</main>

<x-showcase :id="$id" :fontFamily="$styles" :quote="$quote" :author="$author" />

{{-- Replies --}}
{{-- 
<div class="pt-6 space-y-5 bg-[#f5f5f5] mx-auto w-full px-6">
  <h2 class="mb-0 text-lg md:text-2xl font-bold">Replies</h2>

  @foreach($quote->replies() as $reply)
  <livewire:reply.update :reply="$reply" :wire:key="$reply->id()" />
  @endforeach

  <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
    <div class="flex flex-row">
      <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar" src="https://images.unsplash.com/photo-1517070208541-6ddc4d3efbcb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
      <div class="flex-col mt-1">
        <div class="flex items-center flex-1 px-4 font-bold leading-tight">Noob master
          <span class="ml-2 text-xs font-normal text-gray-500">2 weeks ago</span>
        </div>
        <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Wow!!! how you did you
          create this?
        </div>
        <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
          <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900" viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z" fill-rule="nonzero" />
          </svg>
        </button>
        <button class="inline-flex items-center px-1 -ml-1 flex-column">
          <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
            </path>
          </svg>
        </button>
      </div>
    </div>
    <hr class="my-2 ml-16 border-gray-200">
    <div class="flex flex-row pt-1 md-10 md:ml-16">
      <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Emily's avatar" src="https://images.unsplash.com/photo-1581624657276-5807462d0a3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
      <div class="flex-col mt-1">
        <div class="flex items-center flex-1 px-4 font-bold leading-tight">Emily
          <span class="ml-2 text-xs font-normal text-gray-500">5 days ago</span>
        </div>
        <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">I created it using
          TailwindCSS
        </div>
        <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
          <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900" viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z" fill-rule="nonzero" />
          </svg>
        </button>
        <button class="inline-flex items-center px-1 -ml-1 flex-column">
          <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div class="flex-col w-full py-4 mx-auto mt-3 bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
    <div class="flex flex-row md-10">
      <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Anonymous's avatar" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
      <div class="flex-col mt-1">
        <div class="flex items-center flex-1 px-4 font-bold leading-tight">Anonymous
          <span class="ml-2 text-xs font-normal text-gray-500">3 days ago</span>
        </div>
        <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Very cool! I'll have
          to learn more about Tailwind.
        </div>
        <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
          <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900" viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z" fill-rule="nonzero" />
          </svg>
        </button>
        <button class="inline-flex items-center px-1 -ml-1 flex-column">
          <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
            </path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>

@auth
<div class="flex bg-[#f5f5f5] w-full pt-4 md:pb-4">
  <div class="flex mx-auto items-center justify-center shadow-sm md:border  bg-white border-b-2 border-r-2 border-gray-200  sm:rounded sm:shadow-sm md:w-2/3">
    <form action="{{ route('replies.store') }}" method="post" class="w-full max-w-xl bg-white px-2 pt-2">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg font-semibold">Leave a comment</h2>
        <div class="w-full md:w-full px-3 mb-2 mt-2">
          <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
          <x-form.error for="body" />

          <input type="hidden" name="replyable_id" value="{{ $quote->id }}">
          <x-form.error for="replyable_id" />
          <input type="hidden" name="replyable_type" value="quotes">
          <x-form.error for="replyable_type" />
        </div>
        <div class="w-full md:w-full flex justify-end px-3">
          <div class="-mr-1">
            <button type='submit' class="bg-blue-600 text-white cursor-pointer font-medium py-1 px-4 border border-blue-600 rounded tracking-wide mr-1 hover:bg-blue-700">Post</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@else
<div class="flex mx-auto w-full px-6  bg-[#f5f5f5]">
  <div class="flex w-full mt-6 mb-12">
    <div class="flex justify-between w-full p-4 text-gray-700 bg-blue-300 rounded">
      <h2 class="text-md font-semibold">Please login to leave a comment</h2>
      <a href="{{ route('login') }}" class="text-md font-semibold hover:text-gray-700">Login</a>
    </div>
  </div>
</div>
@endauth
--}}


<livewire:newsletter-form />


@endsection

@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
  @font-face {
    font-family: 'Mont-Regular';
    src: local('Mont-Regular'), url(../fonts/Mont-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Mont-Bold';
    src: local('Mont-Bold'), url(../fonts/Mont-Bold.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Mont-Heavy';
    src: local('Mont-Heavy'), url(../fonts/Mont-Heavy.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Aelten';
    src: local('Aelten'), url(../fonts/Aelten.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Alphakind';
    src: local('Alphakind'), url(../fonts/Alphakind.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Amellis';
    src: url(../fonts/Amellis-Path.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Mollusca';
    src: local('Mollusca'), url(../fonts/Baby-Mollusca.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Bajurie';
    src: local('Bajurie'), url(../fonts/Bajurie.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Banda-Aceh';
    src: local('Banda-Aceh'), url(../fonts/Banda-Aceh.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Barokah';
    src: local('Barokah'), url(../fonts/Barokah.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Bitcrusher';
    src: local('Bitcrusher'), url(../fonts/Bitcrusher.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Blue_highway_cd';
    src: local('Blue_highway_cd'), url(../fonts/Blue_highway_cd.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Borg';
    src: local('Borg'), url(../fonts/Borg.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Bright-Dreams';
    src: local('Bright-Dreams'), url(../fonts/Bright-Dreams.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Browie';
    src: local('Browie'), url(../fonts/Browie.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Chandella';
    src: local('Chandella'), url(../fonts/Chandella.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Chinese-Rocks';
    src: local('Chinese-Rocks'), url(../fonts/Chinese-Rocks.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Cokobi';
    src: local('Cokobi'), url(../fonts/Cokobi.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Colombia';
    src: local('Colombia'), url(../fonts/Colombia.ttf) format('truetype');
  }

  @font-face {
    font-family: 'ConcreteWall';
    src: local('ConcreteWall'), url(../fonts/ConcreteWall.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Coolvetica';
    src: local('Coolvetica'), url(../fonts/Coolvetica.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Dakwart';
    src: local('Dakwart'), url(../fonts/Dakwart.ttf) format('truetype');
  }

  @font-face {
    font-family: 'DAGOCA';
    src: local('DAGOCA'), url(../fonts/DAGOCA.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Dealerplate-California';
    src: local('Dealerplate-California'), url(../fonts/Dealerplate-California.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Dream-Orphans';
    src: local('Dream-Orphans'), url(../fonts/Dream-Orphans.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Elliane-Regular';
    src: local('Elliane-Regular'), url(../fonts/Elliane-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Engebrechtre';
    src: local('Engebrechtre'), url(../fonts/Engebrechtre.ttf) format('truetype');
  }

  @font-face {
    font-family: 'ENGINE';
    src: local('ENGINE'), url(../fonts/ENGINE.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Foo';
    src: local('Foo'), url(../fonts/Foo.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Gnuolane';
    src: local('Gnuolane'), url(../fonts/Gnuolane.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Gratise';
    src: local('Gratise'), url(../fonts/Gratise.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Groomer';
    src: local('Groomer'), url(../fonts/Groomer.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Halmera';
    src: local('Halmera'), url(../fonts/Halmera.ttf) format('truetype');
  }

  @font-face {
    font-family: 'HappyGarden';
    src: local('HappyGarden'), url(../fonts/HappyGarden.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Hellohowareyou';
    src: local('Hellohowareyou'), url(../fonts/Hellohowareyou.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Helsinki';
    src: local('Helsinki'), url(../fonts/Helsinki.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Inter-Regular';
    src: local('Inter-Regular'), url(../fonts/Inter-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Jreeng';
    src: local('Jreeng'), url(../fonts/Jreeng.ttf) format('truetype');
  }

  @font-face {
    font-family: 'JustSmile';
    src: local('JustSmile'), url(../fonts/JustSmile.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Kaylafiz';
    src: local('Kaylafiz'), url(../fonts/Kaylafiz.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Kimberley';
    src: local('Kimberley'), url(../fonts/Kimberley.ttf) format('truetype');
  }

  @font-face {
    font-family: 'LazySunday';
    src: local('LazySunday'), url(../fonts/LazySunday.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Leorio';
    src: local('Leorio'), url(../fonts/Leorio.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Limejuice';
    src: local('Limejuice'), url(../fonts/Limejuice.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Lovetle';
    src: local('Lovetle'), url(../fonts/Lovetle.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Lynoselt';
    src: local('Lynoselt'), url(../fonts/Lynoselt.ttf) format('truetype');
  }

  @font-face {
    font-family: 'MatSaleh';
    src: local('MatSaleh'), url(../fonts/MatSaleh.ttf) format('truetype');
  }

  @font-face {
    font-family: 'MelocheBook';
    src: local('MelocheBook'), url(../fonts/MelocheBook.ttf) format('truetype');
  }

  @font-face {
    font-family: 'MightyKingdom';
    src: local('MightyKingdom'), url(../fonts/MightyKingdom.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Monofonto';
    src: local('Monofonto'), url(../fonts/Monofonto.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Morganite-Light';
    src: local('Morganite-Light'), url(../fonts/Morganite-Light.ttf) format('truetype');
  }

  @font-face {
    font-family: 'MorningMiow';
    src: local('MorningMiow'), url(../fonts/MorningMiow.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Mounets';
    src: local('Mounets'), url(../fonts/Mounets.ttf) format('truetype');
  }

  @font-face {
    font-family: 'NoVirus';
    src: local('NoVirus'), url(../fonts/NoVirus.ttf) format('truetype');
  }

  @font-face {
    font-family: 'NugoSansLight';
    src: local('NugoSansLight'), url(../fonts/NugoSansLight.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Oaklevin';
    src: local('Oaklevin'), url(../fonts/Oaklevin.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Ontel';
    src: local('Ontel'), url(../fonts/Ontel.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Peace';
    src: local('Peace'), url(../fonts/Peace.ttf) format('truetype');
  }

  @font-face {
    font-family: 'PeachyRose';
    src: local('PeachyRose'), url(../fonts/PeachyRose.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Pouline';
    src: local('Pouline'), url(../fonts/Pouline.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Pretender';
    src: local('Pretender'), url(../fonts/Pretender.ttf) format('truetype');
  }

  @font-face {
    font-family: 'QuickCount';
    src: local('QuickCount'), url(../fonts/QuickCount.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Rakesly';
    src: local('Rakesly'), url(../fonts/Rakesly.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Rennoya';
    src: local('Rennoya'), url(../fonts/Rennoya.ttf) format('truetype');
  }

  @font-face {
    font-family: 'ROLAND';
    src: local('ROLAND'), url(../fonts/ROLAND.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Saolice';
    src: local('Saolice'), url(../fonts/Saolice.ttf) format('truetype');
  }

  @font-face {
    font-family: 'SimpalaExtended';
    src: local('SimpalaExtended'), url(../fonts/SimpalaExtended.ttf) format('truetype');
  }

  @font-face {
    font-family: 'SingleSleeve';
    src: local('SingleSleeve'), url(../fonts/SingleSleeve.ttf) format('truetype');
  }

  @font-face {
    font-family: 'StraightlerRegular';
    src: local('StraightlerRegular'), url(../fonts/StraightlerRegular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'SweetSomeday';
    src: local('SweetSomeday'), url(../fonts/SweetSomeday.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Tahu';
    src: local('Tahu'), url(../fonts/Tahu.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Thruster-Regular';
    src: local('Thruster-Regular'), url(../fonts/Thruster-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'VirusKiller';
    src: local('VirusKiller'), url(../fonts/VirusKiller.ttf) format('truetype');
  }

  @font-face {
    font-family: 'WallabysJunior';
    src: local('WallabysJunior'), url(../fonts/WallabysJunior.ttf) format('truetype');
  }

  @font-face {
    font-family: 'WanitaCantik';
    src: local('WanitaCantik'), url(../fonts/WanitaCantik.ttf) format('truetype');
  }

  @font-face {
    font-family: 'ZZYZX';
    src: local('ZZYZX'), url(../fonts/ZZYZX.ttf) format('truetype');
  }

  @font-face {
    font-family: 'WhereTheCookies';
    src: local('WhereTheCookies'), url(../fonts/WhereTheCookies.ttf) format('truetype');
  }

  @font-face {
    font-family: 'WKSimple';
    src: local('WKSimple'), url(../fonts/WKSimple.ttf) format('truetype');
  }


  @font-face {
    font-family: 'Arvo-Regular';
    src: local('Arvo-Regular'), url(../fonts/Arvo-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Cinzel-Regular';
    src: local('Cinzel-Regular'), url(../fonts/Cinzel-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Domine-Regular';
    src: local('Domine-Regular'), url(../fonts/Domine-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'LiberationSerif-Regular';
    src: local('LiberationSerif-Regular'), url(../fonts/LiberationSerif-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Lustria-Regular';
    src: local('Lustria-Regular'), url(../fonts/Lustria-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Mohave-Regular';
    src: local('Mohave-Regular'), url(../fonts/Mohave-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Montserrat-Regular';
    src: local('Montserrat-Regular'), url(../fonts/Montserrat-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'NotoSans-Regular';
    src: local('NotoSans-Regular'), url(../fonts/NotoSans-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Promesh_Regular';
    src: local('Promesh_Regular'), url(../fonts/Promesh_Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Raleway-Regular';
    src: local('Raleway-Regular'), url(../fonts/Raleway-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Rubik-Regular';
    src: local('Rubik-Regular'), url(../fonts/Rubik-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Zaio';
    src: local('Zaio'), url(../fonts/Zaio.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Antonio-Regular';
    src: local('Antonio-Regular'), url(../fonts/Antonio-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Bitter-Regular';
    src: local('Bitter-Regular'), url(../fonts/Bitter-Regular.ttf) format('truetype');
  }

  @font-face {
    font-family: 'CrimsonText-Roman';
    src: local('CrimsonText-Roman'), url(../fonts/CrimsonText-Roman.ttf) format('truetype');
  }

  @font-face {
    font-family: 'COBAISSI';
    src: local('COBAISSI'), url(../fonts/COBAISSI.ttf) format('truetype');
  }

  div#social-links {
    /* background-color: #ccc; */
    display: flex;
    /* margin: 0 auto; */
    max-width: 260px;
  }

  div#social-links ul li {
    display: inline-block;
  }

  div#social-links ul li a {
    border-radius: 100%;
    padding: 7px 10px;
    /* border: 1px solid #ccc; */
    margin: 1px;
    font-size: 20px;
    color: #222;
    background-color: #eee;
  }
</style>
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  let text = document.getElementById('myText').innerHTML;
  const copyContent = async () => {
    try {
      await navigator.clipboard.writeText(text);
      console.log('Content copied to clipboard');
      toastr.success('Success copy to clipboard', {
        timeOut: 2000
      })
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
</script>
@endpush