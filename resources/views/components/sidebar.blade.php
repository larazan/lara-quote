  <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

  <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
      <div class="flex items-center justify-center mt-8">
          <div class="flex items-center">
              <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white" />
              </svg>

              <span class="text-white text-2xl mx-2 font-semibold">Dashboard</span>
          </div>
      </div>

      <nav class="mt-10">
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['dashboard'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M13.45 11.55l2.05 -2.05"></path>
                <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
            </svg>

              <span class="mx-3">Dashboard</span>
          </a>

          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['categories'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/categories') }}">
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
              </svg>

              <span class="mx-3">Categories</span>
          </a>

          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['persons'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/persons') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path>
                  <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>
              </svg>

              <span class="mx-3">Persons</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['quotes'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/quotes') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-blockquote" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M6 15h15"></path>
                  <path d="M21 19h-15"></path>
                  <path d="M15 11h6"></path>
                  <path d="M21 7h-6"></path>
                  <path d="M9 9h1a1 1 0 1 1 -1 1v-2.5a2 2 0 0 1 2 -2"></path>
                  <path d="M3 9h1a1 1 0 1 1 -1 1v-2.5a2 2 0 0 1 2 -2"></path>
              </svg>

              <span class="mx-3">Quotes</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['riddles'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/riddles') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-question" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M8 9h8"></path>
                  <path d="M8 13h6"></path>
                  <path d="M14 18h-1l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"></path>
                  <path d="M19 22v.01"></path>
                  <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
              </svg>

              <span class="mx-3">Riddles</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['category-article'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/category-article') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 4h6v6h-6z"></path>
                  <path d="M14 4h6v6h-6z"></path>
                  <path d="M4 14h6v6h-6z"></path>
                  <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
              </svg>

              <span class="mx-3">Category Article</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['articles'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/articles') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                  <path d="M7 8h10"></path>
                  <path d="M7 12h10"></path>
                  <path d="M7 16h10"></path>
              </svg>

              <span class="mx-3">Article</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['faqs'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/faqs') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-octagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M9.103 2h5.794a3 3 0 0 1 2.122 .879l4.101 4.1a3 3 0 0 1 .88 2.125v5.794a3 3 0 0 1 -.879 2.122l-4.1 4.101a3 3 0 0 1 -2.123 .88h-5.795a3 3 0 0 1 -2.122 -.88l-4.101 -4.1a3 3 0 0 1 -.88 -2.124v-5.794a3 3 0 0 1 .879 -2.122l4.1 -4.101a3 3 0 0 1 2.125 -.88z"></path>
                  <path d="M12 16v.01"></path>
                  <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
              </svg>

              <span class="mx-3">FAQs</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['newsletters'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/newsletters') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                  <path d="M8 8l4 0"></path>
                  <path d="M8 12l4 0"></path>
                  <path d="M8 16l4 0"></path>
              </svg>

              <span class="mx-3">Newletters</span>
          </a>
          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['tags'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/tags') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmarks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M13 7a2 2 0 0 1 2 2v12l-5 -3l-5 3v-12a2 2 0 0 1 2 -2h6z"></path>
                  <path d="M9.265 4a2 2 0 0 1 1.735 -1h6a2 2 0 0 1 2 2v12l-1 -.6"></path>
              </svg>

              <span class="mx-3">Tags</span>
          </a>

          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['users'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/users') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg>

              <span class="mx-3">Users</span>
          </a>

          <a class="flex items-center mt-2 py-2 px-6  hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 @if(in_array(Request::segment(2), ['settings'])){{ 'bg-gray-700 bg-opacity-25 text-gray-100' }}@else{{ 'text-gray-500' }}@endif" href="{{ url('admin/settings') }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
        </svg>

              <span class="mx-3">Settings</span>
          </a>

      </nav>
  </div>