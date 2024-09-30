<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="author" content="John Doe">
  <title>
    {{ isset($title) ? $title.' | ' : '' }}
    {{ config('app.name') }}
    {{ General::is_active('home') ? '- Inspirational Quotes Library' : '' }}
  </title>
  @if(General::is_active('home'))
  <meta name="description" content="The Laravel portal for problem solving, knowledge sharing and community building." />
  @endif
  <link rel="icon" href="/frontend/img/favicons/favicon.ico">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

  <style>
    [x-cloak] {
      display: none;
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>

  @stack('meta')

  @include('frontend.layouts._favicons')
  @include('frontend.layouts._social')

  <!-- CSS -->
  @stack('style')
  @livewireStyles

  <style>
    ::-webkit-scrollbar {
      height: 12px;
      width: 16px
    }

    ::-webkit-scrollbar-track {
      background: 0 0
    }

    ::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, .2);
      border: 4px solid #fff;
      border-radius: 50px
    }

    .dark .overflow-y-auto::-webkit-scrollbar-thumb {
      background: hsla(0, 0%, 100%, .2);
      border: 4px solid #121927
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #12d3cf
    }

    .custom-scrollbar::-webkit-scrollbar {
      height: 10px;
      width: 10px
    }

    .custom-scrollbar::-webkit-scrollbar-track {
      background: transparent
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: transparent
    }

    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
      background: #b2b7b8;
      border-radius: 0px;
      border: 4px solid #b2b7b8;
    }
  </style>
</head>

<body x-data="{ filterOpen: false }">

  @include('frontend.layouts._header')
  @include('frontend.components._gotop')

  @yield('content')

  @include('frontend.layouts._footer')

  @stack('modals')

  @livewireScripts
  @stack('js')

  <script>
    window.addEventListener('banner-message', event => {
      toastr[event.detail.style](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
      }
    });

    @if(Session::has('pesan'))
    toastr. {
      {
        Session::get('alert')
      }
    }("{{Session::get('pesan')}}");
    @endif
  </script>

</body>

</html>