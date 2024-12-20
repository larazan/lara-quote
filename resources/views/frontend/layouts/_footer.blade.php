@php
$setting = \App\Models\Setting::findOrFail(1)->first();

        $facebook = $setting->facebook;
        $twitter = $setting->twitter;
        $instagram = $setting->instagram;
@endphp
<footer class="flex w-full bg-[#f3f6fb]">
  <div class="mx-auto max-w-5xl ">
    <div class="px-6 py-2 md:py-6 sm:px-6 lg:col-span-3 lg:px-8">
      <div class="grid grid-cols-1 gap-10 sm:grid-cols-2">
        <div class="mt-6">
          <div class="flex w-full flex-row space-x-2 justify-center md:justify-start sm:flex-wrap">
            <a href="/" target="_blank" rel="noreferrer">
              <img src="/frontend/img/logo.png" alt="logo" class="w-full h-16 md:h-16" />
            </a>
            
          </div>
          <div class="flex w-full justify-center md:justify-start py-6">
            <nav aria-label="Footer Navigation - Support">
              <ul class="flex gap-6 ">
                <li>
                  <a href="{{ $facebook }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#3b5998]">
                    <span class="sr-only">Facebook</span>

                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $instagram }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#e1306c]">
                    <span class="sr-only">Instagram</span>

                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $twitter }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#1DA1F2]">
                    <span class="sr-only">Twitter</span>

                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $twitter }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#C8232C]">
                    <span class="sr-only">Pinterst</span>

                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-pinterest"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 20l4 -9" /><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /></svg>
                  </a>
                </li>

              </ul>
            </nav>
          </div>
        </div>


        <div class="grid grid-cols-2 gap-6 md:gap-10 sm:grid-cols-2">
          <div>
            <nav aria-label="Footer Navigation - Services" class="mt-0 md:mt-6">
              <ul class="space-y-2 text-sm font-mabrybold">
                <li>
                  <a href="{{ route('faqs') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Help
                  </a>
                </li>

                <li>
                  <a href="{{ route('about') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    About
                  </a>
                </li>

                <li>
                  <a href="{{ route('contact') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Contact
                  </a>
                </li>

                <li>
                  <a href="{{ route('terms') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Terms of Service
                  </a>
                </li>

                <li>
                  <a href="{{ route('privacy-policy') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Privacy Policy
                  </a>
                </li>
              </ul>
            </nav>
          </div>

          <div>
            <nav aria-label="Footer Navigation - Company" class="mt-0 md:mt-6">
              <ul class="space-y-2 text-sm font-mabrybold">
                <li>
                  <a href="{{ route('quotes') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Quotes
                  </a>
                </li>

                <li>
                  <a href="{{ route('riddles') }}" class="hidden font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Riddles
                  </a>
                </li>
                <li>
                  <a href="{{ route('people') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    People
                  </a>
                </li>
                <li>
                  <a href="{{ route('tags') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Topics
                  </a>
                </li>
                <li>
                  <a href="{{ route('articles') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Articles
                  </a>
                </li>
                <li>
                  <a href="{{ route('advertise') }}" class="font-bold text-gray-900 transition hover:text-[#FF6D42]">
                    Advertise
                  </a>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="pt-6 md:pt-12">
        <div class="py-0 sm:mb-0 mx-2 md:mx-5 xl:mx-auto text-center border-gray-300 border-t-[0.5px]  max-w-7xl">
          <p class="text-sm text-gray-700 my-3 md:my-6">©{{ date('Y') }} Million Quotes – All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>