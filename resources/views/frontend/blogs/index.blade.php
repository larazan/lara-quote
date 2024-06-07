@extends('frontend.layout')

@section('content')

<main class="relative bg-white pb-12">
        <div class="mx-auto max-w-screen-lg">
          <div
            class="px-6 pt-24 md:pt-24 pb-8 md:pb-20"
            
          >
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-headline font-black tracking-snug text-center leading-12 sm:leading-15 md:leading-19 lg:leading-26 text-gray-800">
              <span>The SavvyCal Blog</span>
            </h1>
            <p class="text-gray-600 text-lg md:text-2xl text-center leading-normal md:leading-9 mt-3 md:mt-6">
              We write about how to manage your time well.
            </p>
            <div
              class="pt-10 flex justify-center text-yellow-300"
              
            >
              <svg width="204" height="14" xmlns="http://www.w3.org/2000/svg">
                <g fill="currentColor" fill-rule="evenodd">
                  <path d="M.835 7.23c-.264-.864-.033-1.753.708-2.42.91-.758 2.285-.742 3.1.09l.112.124a9.767 9.767 0 006.37 3.34c2.362.24 4.745-.389 6.631-1.785l.254-.195c.186-.132.367-.283.548-.442l.557-.494c.096-.083.194-.166.295-.247l.58-.527c.702-.632 1.495-1.31 2.412-1.835 2.201-1.24 4.914-1.629 7.719-1.101 2.083.433 4.232 1.286 6.575 2.773 1.087.674 1.395 2.09.702 3.12-.674 1.088-2.09 1.395-3.12.703-1.932-1.172-3.533-1.878-5.068-2.164-1.743-.348-3.385-.161-4.603.589-.565.314-1.09.758-1.63 1.242l-.546.493-1.635 1.444c-2.854 2.194-6.555 3.263-10.183 2.925-3.57-.356-7.01-2.137-9.36-4.88a1.922 1.922 0 01-.418-.753zM93.541 4.686c.38.828.24 1.815-.424 2.521-.843.95-2.348.97-3.297.127-1.86-1.76-4.35-2.698-6.806-2.702a9.87 9.87 0 00-6.533 2.539l-.238.223a6.299 6.299 0 00-.628.648l-.418.49c-.073.085-.148.171-.226.258l-.82.908c-.566.62-1.183 1.257-1.933 1.822-2.056 1.51-4.796 2.221-7.703 1.977-2.204-.207-4.415-.853-7.01-2.136-1.185-.582-1.665-1.946-1.083-3.13.502-1.12 1.829-1.623 2.93-1.135l.143.069c2.069 1.004 3.807 1.542 5.364 1.695 1.806.14 3.452-.237 4.635-1.102.66-.517 1.326-1.223 1.973-1.988l.732-.822c.253-.281.512-.565.776-.834C75.59 1.552 79.225.063 82.92.003 86.633 0 90.273 1.405 92.95 3.986c.3.16.503.412.591.7z"></path>
                  <g>
                    <path d="M112.835 7.23c-.264-.864-.033-1.753.708-2.42.91-.758 2.285-.742 3.1.09l.112.124a9.767 9.767 0 006.37 3.34c2.362.24 4.745-.389 6.631-1.785l.254-.195c.186-.132.367-.283.548-.442l.557-.494c.096-.083.194-.166.295-.247l.58-.527c.702-.632 1.495-1.31 2.412-1.835 2.201-1.24 4.914-1.629 7.719-1.101 2.083.433 4.232 1.286 6.575 2.773 1.087.674 1.395 2.09.702 3.12-.674 1.088-2.09 1.395-3.12.703-1.932-1.172-3.533-1.878-5.068-2.164-1.743-.348-3.385-.161-4.603.589-.565.314-1.09.758-1.63 1.242l-.546.493-1.635 1.444c-2.854 2.194-6.555 3.263-10.183 2.925-3.57-.356-7.01-2.137-9.36-4.88a1.922 1.922 0 01-.418-.753zM203.541 4.686c.38.828.24 1.815-.424 2.521-.843.95-2.348.97-3.297.127-1.86-1.76-4.35-2.698-6.806-2.702a9.87 9.87 0 00-6.533 2.539l-.238.223a6.299 6.299 0 00-.628.648l-.418.49c-.073.085-.148.171-.226.258l-.82.908c-.566.62-1.183 1.257-1.933 1.822-2.056 1.51-4.796 2.221-7.703 1.977-2.204-.207-4.415-.853-7.01-2.136-1.185-.582-1.665-1.946-1.083-3.13.502-1.12 1.829-1.623 2.93-1.135l.143.069c2.069 1.004 3.807 1.542 5.364 1.695 1.806.14 3.452-.237 4.635-1.102.66-.517 1.326-1.223 1.973-1.988l.732-.822c.253-.281.512-.565.776-.834 2.615-2.562 6.25-4.051 9.946-4.111 3.712-.002 7.352 1.402 10.029 3.983.3.16.503.412.591.7z"></path>
                  </g>
                </g>
              </svg>
            </div>
          </div>

          <div class="px-6">
            <ul class="grid grid-flow-row grid-cols-1 md:grid-cols-2 gap-10">
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/lead-generation-for-b2b/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    Lead Generation for B2B: What Works Now in 2023
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  Today’s most successful B2B sales and marketing teams are
                  using these 7 lead generation tactics to get higher-quality
                  leads, and so can you.
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Claire Emerson"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div
                        class="text-sm text-gray-500"
                        
                      >
                        <time datetime="2023-21-25">Feb 21, 2023</time>
                        <span> · </span>
                        <span>5 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/calendar-optimization/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    Calendar Optimization: 28 Scheduling Hacks To Save Time and
                    Stay Organized
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  No matter what ails you the most about your scattered
                  scheduling systems and calendar woes, there are plenty of ways
                  you can streamline your process to help you create more time.
                  And wield more control over your daily commitments.
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Steli Efti"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2022-29-55">Jun 29, 2022</time>
                        <span> · </span>
                        <span>15 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/best-podcasts-to-listen-to-at-work/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    26 best podcasts to listen to at work (and how to use what
                    you learn to get ahead)
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  The right podcasts can help you gain confidence, develop new
                  habits, find clarity, hone new skills, and fuel your desire
                  for perpetual growth and learning. We&lsquo;ve curated 26 of the
                  best podcasts you can listen to at work (and how to use them
                  to get ahead.)
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Claire Emerson"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2022-12-36">Apr 12, 2022</time>
                        <span> · </span>
                        <span>16 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/context-switching/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    Context Switching: 10 shortcuts for gaining back focus in
                    record time
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  Let’s take a look at how you can make the most of switching
                  contexts throughout your day, as well as how to engage in deep
                  work and trigger your focused flow states as quickly as
                  possible.
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Claire Emerson"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2022-08-33">Mar 8, 2022</time>
                        <span> · </span>
                        <span>11 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/work-from-home-setup/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    Upgrade Your Work From Home Setup: 28 remote pros share
                    their best tips and recommendations
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  Creating a dedicated space (with the freedom to roam) and
                  designing a setup conducive to your best work can boost your
                  performance and encourage behaviors that lead to more focus
                  and follow-through.
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Claire Emerson"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2022-20-47">Jan 20, 2022</time>
                        <span> · </span>
                        <span>13 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="py-6 md:py-10">
                <h2 class="pb-4 text-center md:text-left">
                  <a
                    href="/articles/how-to-plan-your-day/"
                    class="text-2xl md:text-3xl leading-8 md:leading-10 font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150"
                  >
                    How To Plan Your Day To Maximize Your Time (And Minimize
                    Distractions)
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-center md:text-left">
                  By adopting habits, routines, and rituals that maximize your
                  time, minimize distractions, and make follow-through your
                  focus — navigating your tasks and projects becomes a breeze.
                </p>
                <div
                  class="pt-6 flex justify-center md:justify-start"
                  
                >
                  <div class="flex items-center" >
                    <div class="w-10 h-10" >
                      <img
                        src="{{ url('frontend/img/claire.png') }}"
                        alt="Claire Emerson"
                        class="rounded-full w-full"
                      />
                    </div>
                    <div class="ml-3 leading-6" >
                      <div
                        class="font-medium text-gray-600"
                        
                      >
                        Claire Emerson
                      </div>
                      <div class="text-sm text-gray-500" >
                        <time datetime="2021-29-00">Nov 29, 2021</time>
                        <span> · </span>
                        <span>13 min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <Pagination />
        </div>
        
      </main>

      @include('frontend.components._subscribe_form')

@endsection