@extends('frontend.layout')

@section('content')

<div class="pt-[60px] md:pt-[60px] bg-gray-50">
    
    <div
        class="w-full bg-center bg-gray-600 h-32 md:h-48"
        style="background-image: url('{{ asset('images/default-background.svg') }}')"
    ></div>

    <div class="container mx-auto">
        <div class="flex justify-center lg:justify-start">
            <img class="-mt-16 md:-mt-24 w-28 h-28 md:w-48 md:h-48 rounded-full border-4 md:border-8 border-white uppercase" src="{{ Avatar::create(ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name))->toBase64() }}"  alt="{{ Auth::user()->first_name }}" />
        </div>

        <div class="flex flex-col mt-5 p-4 lg:flex-row lg:gap-x-12">
            <div class="w-full mb-10 lg:w-1/3 lg:mb-0">
                <div>
                    <div class="flex items-center gap-x-4">
                        <h1 class="text-4xl font-bold">{{ Auth::user()->username() }}</h1>
                    </div>

                    <span class="text-gray-600">
                        Joined {{ Auth::user()->createdAt()->format('j M Y') }}
                    </span>
                </div>

            </div>
            
        </div>
    </div>

    @include('frontend.layouts._alerts')

    <main class="max-w-5xl mx-auto pt-2 pb-12 px-4 lg:pb-16">
        <div class="md:grid md:gap-x-2 md:grid-cols-4">
            <div class="sm:px-6 lg:px-0 md:col-span-1">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <nav class="sticky top-20 space-y-1" aria-label="Sidebar">
                    <a href="#profile_settings_heading" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <span class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <span class="truncate">Profile</span>
                    </a>
                    <a href="#password_settings_heading" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <span class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                        </span>
                        <span class="truncate">Password</span>
                    </a>

                    @if (Auth::check())
                    <a href="#remove_account_heading" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <span class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                        <span class="truncate">Remove Account</span>
                    </a>
                    @endif
                </nav>
            </div>
            <div class="mt-10 md:mt-0 sm:px-6 md:px-0 md:col-span-3">
                @include('frontend.settings.profile')
                @include('frontend.settings.password')
                @include('frontend.settings.remove')
            </div>
        </div>
    </main>
</div>

@endsection