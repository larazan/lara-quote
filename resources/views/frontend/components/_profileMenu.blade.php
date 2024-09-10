<div class="relative inline-flex" x-data="{ open: false }" >
  @if(Auth::check())
  <button class="w-8 h-8 flex items-center justify-center bg-transparent hover:bg-slate-200 transition duration-150 rounded-full" aria-haspopup="true" @click.outside="open = false" @click.prevent="open = !open" :aria-expanded="open">
  <div class="flex justify-center w-full ">
        <img class="w-8 h-8 rounded-full uppercase" src="{{ Avatar::create(ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name))->toBase64() }}" width="32" height="32" alt="{{ Auth::user()->first_name }}" />
      </div>
  </button>
  @else
  <a href="{{ url('login') }}" class="w-6 h-6 flex2 hidden items-center justify-center bg-transparent hover:bg-slate-200 transition duration-150 rounded-full">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=1.5 stroke="currentColor" class="w-5 h-5 text-slate-900">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
    </svg>
  </a>
  <livewire:login-modal />
  @endif
  
  <div class="flex origin-top-right z-30 absolute top-full shadow-menu2 right-0 -mr-2 md:-mr-2 sm:mr-0 min-w-52 w-48 bg-white rounded border border-slate-300 py-1.5  shadow-lg overflow-hidden mt-1.5 md:mt-1.5" enter="transition ease-out duration-200 transform" enterStart="opacity-0 -translate-y-2" enterEnd="opacity-100 translate-y-0" leave="transition ease-out duration-200" leaveStart="opacity-100" leaveEnd="opacity-0"  @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
    <div class="flex flex-col w-full">
     
      <div class="flex flex-col text-sm font-semibold font-mabrybold text-slate-600 capitalize pt-1.5 pb-1 px-4">
        @if(Auth::check())
        {{ Auth::user()->first_name.' '.Auth::user()->last_name }}
        
        <span class="text-slate-600 font-mabry">@ {{ Auth::user()->username ? Auth::user()->username : '-' }}</span>
        @endif
      </div>
      <ul class="">
        <li class="border-b last:border-0">
          <a class="block py-2 px-4 hover:bg-gray-100 text-slate-600 hover:text-gray-900" href="{{ url('/settings') }}">
            <span class="block text-sm mb-0 font-semibold">
              <span class="capitalize font-semibold">
                Your Profile
              </span>
            </span>
          </a>
        </li>
        <li class="last:border-0">
          <a class="block py-1.5 px-4  hover:text-gray-900 text-slate-600  hover:bg-gray-100" href="{{ url('/settings') }}">
            <span class="block text-sm font-semibold font-mabry mb-0">
              Settings
            </span>
          </a>
        </li>
        <li class="border-b last:border-0">
          <a class="block py-1.5 px-4  hover:text-gray-900 text-slate-600  hover:bg-gray-100" href="{{ url('/') }}">
            <span class="block text-sm font-semibold font-mabry mb-0">
              Help
            </span>
          </a>
        </li>
        <li class="w-full border-b last:border-0">
          <div class="flex w-full items-center space-x-2 py-1.5 px-2 ">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
              @csrf

              <button 
                type="submit"
                
                @focus="open = true" 
                @focusout="open = false" 
                class="flex w-full shadow-menu items-center justify-center rounded px-2 py-1.5 space-x-2 bg-[#e31c2d] opacity-90 hover:opacity-90"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={2} stroke="currentColor" class="w-5 h-5 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>

                <span class="text-xs font-semibold font-mabrybold text-white">
                  {{ __('Sign Out') }}
                </span>

                </button>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
  
</div>