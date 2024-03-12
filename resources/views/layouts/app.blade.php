<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->

  <!-- @trixassets -->
  @livewireStyles

  <link href="{{ URL::asset('admin/css/app.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet" />

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <style>
    .select2.select2-container {
      width: 100% !important;
    }

    .select2.select2-container .select2-selection {
      border: 1px solid #ccc;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      height: 34px;
      margin-bottom: 15px;
      outline: none !important;
      transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
      color: #333;
      line-height: 32px;
      padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
      background: #f8f8f8;
      border-left: 1px solid #ccc;
      -webkit-border-radius: 0 3px 3px 0;
      -moz-border-radius: 0 3px 3px 0;
      border-radius: 0 3px 3px 0;
      height: 32px;
      width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
      background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
      -webkit-border-radius: 0 3px 0 0;
      -moz-border-radius: 0 3px 0 0;
      border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
      border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
      height: auto;
      min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
      margin-top: 2px;
      margin-bottom: 2px;
      height: 30px;
      width: 100% !important;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
      display: block;
      padding: 0 4px;
      line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #f8f8f8;
      border: 1px solid #ccc;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      margin: 4px 4px 0 0;
      padding: 0 6px 0 22px;
      height: 24px;
      line-height: 24px;
      font-size: 12px;
      position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
      position: absolute;
      top: 0;
      left: 0;
      height: 22px;
      width: 22px;
      margin: 0;
      text-align: center;
      color: #e74c3c;
      font-weight: bold;
      font-size: 16px;
    }

    .select2-container .select2-dropdown {
      background: transparent;
      border: none;
      margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
      outline: none !important;
      border: 1px solid #34495e !important;
      border-bottom: none !important;
      padding: 4px 6px !important;
    }

    .select2-container .select2-dropdown .select2-results {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
      background: #fff;
      border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
      background-color: #3498db;
    }

    .select2 input .select2-search__field {
      min-width: 100% !important;
    }


    input[type=file] {
      width: 100%;
      max-width: 100%;
      color: #444;
      padding: 3px;
      background: #fff;
      border-radius: 3px;
      border: 1px solid #555;
    }

    input[type=file]::file-selector-button {
      margin-right: 20px;
      border: none;
      background: #1e293b;
      padding: 6px 14px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
      transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
      background: #0d45a5;
    }
  </style>
  @stack('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
 
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
  <!-- <x-banner /> -->
  <script>
    if (localStorage.getItem('sidebar-expanded') == 'true') {
      document.querySelector('body').classList.add('sidebar-expanded');
    } else {
      document.querySelector('body').classList.remove('sidebar-expanded');
    }
  </script>

  <!-- Page wrapper -->
  <div class="flex h-screen overflow-hidden ss la ">

    <x-app.sidebar />

    <!-- Content area -->
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif y flex ak ug ll lc bg-white" x-ref="contentarea">

      <x-app.header />

      <main>
        {{ $slot }}
      </main>

    </div>

  </div>

  @stack('modals')

  @livewireScripts
  @stack('js')
  <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
  
  <script>
    window.addEventListener('banner-message', event => {
      toastr[event.detail.style](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
      }
    });

    @if (Session::has('pesan'))
      toastr.{{Session::get('alert')}}("{{Session::get('pesan')}}");
    @endif  

    var inputField = document.querySelector('#numbers-only');

    inputField.onkeydown = function(event) {
      // Only allow if the e.key value is a number or if it's 'Backspace'
      if (isNaN(event.key) && event.key !== 'Backspace') {
        event.preventDefault();
      }
    };

    function onlyNumberKey(evt) {

      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>

</body>

</html>