<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo"></x-slot>

    <div class="w-full sm:max-w-lg mx-auto flex flex-col gap-4 p-4 bg-white ">
        <div class="mx-auto max-w-sm">
            <x-jet-authentication-card-logo />
        </div>        
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="justify-center inline-flex items-center px-4 py-3 bg-slate-600 dark:bg-slate-700 dark:hover:bg-slate-800 border border-transparent rounded-lg font-bold text-white dark:text-gray-200 tracking-wide hover:bg-slate-700 focus:bg-slate-700 dark:focus:bg-slate active:bg-slate-900 dark:active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-slate-400/30 dark:shadow-slate-800/30 w-full ">
                {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

    </div>
 

    </x-jet-authentication-card>
</x-guest-layout>
