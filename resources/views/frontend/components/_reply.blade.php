
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