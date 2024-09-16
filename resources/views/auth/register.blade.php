<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="w-full sm:max-w-lg mx-auto flex flex-col gap-4 p-4 bg-white ">
            <div class="mx-auto max-w-sm">
                <x-jet-authentication-card-logo />
            </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div> -->

            <div>
                <x-jet-label for="first_name" value="First Name" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>

             <div class="mt-4">
                <x-jet-label for="last_name" value="Last Name" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex w-full items-center justify-end mt-2 flex-col gap-4">

                    <div class="flex items-center w-full justify-end mt-4">
                        <button type="submit" class="justify-center inline-flex items-center px-4 py-3 bg-slate-600 dark:bg-slate-700 dark:hover:bg-slate-800 border border-transparent rounded-lg font-bold text-white dark:text-gray-200 tracking-wide hover:bg-slate-700 focus:bg-slate-700 dark:focus:bg-slate active:bg-slate-900 dark:active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-slate-400/30 dark:shadow-slate-800/30 w-full ">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="space-x-6">
                        <a  href="{{ route('login') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:underline underline-offset-8">
                            Already Register?
                        </a>
                    </div>
                </div>


        </form>

        </div>

       

    </x-jet-authentication-card>
</x-guest-layout>
