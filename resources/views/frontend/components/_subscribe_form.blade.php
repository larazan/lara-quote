<aside class="py-8 md:py-16 bg-gray-50 lg:py-20 dark:bg-gray-800 border-t border-b border-gray-100 dark:border-gray-700">
  <div class="px-6 mx-auto max-w-8xl">
    <h2 class="mb-4 text-2xl md:text-4xl font-bold tracking-tight text-gray-900 md:font-extrabold lg:leading-none dark:text-white md:text-center lg:mb-7">
      Sign up for our newsletter
    </h2>
    <p class="mb-4 text-sm leading-tight md:leading-normal text-gray-500 md:mb-6 dark:text-gray-400 md:text-center md:text-xl lg:px-20 xl:px-56">
      Sign up for our newsletter and you will be among the first to find out
      about new articles, quotes, riddles, and more.
    </p>
    <div class="mb-4">
      <form action="{{ route('subscribe.store') }}" method="post" class="flex max-w-xl md:mx-auto">
        @csrf
        <div class="w-full" data-style="clean">
          <label for="member_email" class="hidden">
            Email address
          </label>
          <div class="relative h-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
              </svg>
            </div>
            <input type="email" id="member_email" name="email" class="block w-full px-3 py-3 md:py-4 pl-11 text-base text-gray-900 bg-white border border-gray-200 rounded-l-xl formkit-input focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required="" />
          </div>
        </div>
        <div>
          <input type="submit" data-element="submit" id="member_submit" class="w-full px-4 py-3 md:py-4 text-base font-medium text-center text-white bg-blue-600 border border-blue-600 cursor-pointer rounded-r-xl formkit-submit hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" value="submit" />
        </div>
      </form>
    </div>
    <p class="text-sm text-gray-500 md:text-center dark:text-gray-400 font-normal">
      By subscribing, you agree with
      <a rel="nofollow noopener noreferrer" class="text-blue-600 dark-text-blue-400 hover:underline" href="{{ route('terms') }}">
        Terms of Service
      </a>
      and
      <a class="text-blue-600 dark-text-blue-400 hover:underline" rel="nofollow noopener noreferrer" href="{{ route('privacy-policy') }}">
        Privacy Policy
      </a>
      .
    </p>
  </div>
</aside>