<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="w-full sm:max-w-lg mx-auto flex flex-col gap-4 p-4 bg-white ">
            <div class="mx-auto max-w-sm">
                <x-jet-authentication-card-logo />
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex w-full items-center justify-end mt-2 flex-col gap-4">

                    <div class="flex items-center w-full justify-end mt-4">
                        <button type="submit" class="justify-center inline-flex items-center px-4 py-3 bg-slate-600 dark:bg-slate-700 dark:hover:bg-slate-800 border border-transparent rounded-lg font-bold text-white dark:text-gray-200 tracking-wide hover:bg-slate-700 focus:bg-slate-700 dark:focus:bg-slate active:bg-slate-900 dark:active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-slate-400/30 dark:shadow-slate-800/30 w-full ">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <div class="space-x-6">
                        <a  href="{{ route('register') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:underline underline-offset-8">
                            Register
                        </a>
                        @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:underline underline-offset-8">
                            Forgot Password
                        </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>

    </x-jet-authentication-card>
</x-guest-layout>