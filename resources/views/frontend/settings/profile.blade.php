@title('Profile')

<section aria-labelledby="profile_settings_heading">

    <form method="PUT" action="{{ route('settings.profile.update') }}">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h2 id="profile_settings_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Profile
                    </h2>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                        Update your profile information.
                    </p>
                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-6">
                        <label for="firstname" class="block text-sm font-medium leading-5 text-gray-700">First Name</label>

                        <x-forms.inputs.input id="firstname" name="first_name" type="text" :value="Auth::user()->firstName()" required />
                    </div>
                    <div class="col-span-6">
                        <label for="lastname" class="block text-sm font-medium leading-5 text-gray-700">Last Name</label>

                        <x-forms.inputs.input id="lastname" name="last_name" type="text" :value="Auth::user()->lastName()" required />
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <label for="image" class="block text-sm font-medium leading-5 text-gray-700">Profile Image</label>

                        <div class="flex items-center ">
                            <div class="shrink-0 inline-block overflow-hidden" aria-hidden="true">
                                <div class="h-32 w-32 mt-4" unlinked >
                                    <img loading="lazy"
                                        src="{{ asset('frontend/img/laravelio-icon-gray.svg') }}"
                                        alt="{{ Auth::user()->fullName() }}"
                                        class="bg-gray-50 rounded-full" />
                                </div>

                                <span class="mt-0 inline-block text-sm text-gray-500">
                                    Change your avatar for
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>

                        <x-forms.inputs.email id="email" name="email" type="email" :value="Auth::user()->emailAddress()" required />

                        @unless(Auth::user()->hasVerifiedEmail())
                            <span class="mt-2 text-sm text-gray-500">
                                This email address is not verified yet.

                                <a href="{{ route('verification.notice') }}" class="text-lio-500">
                                    Resend verification email.
                                </a>
                            </span>
                        @endunless
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="username" class="block text-sm font-medium leading-5 text-gray-700">Username</label>

                        <x-forms.inputs.input id="username" name="username" type="text" :value="Auth::user()->username()" required />
                    </div>

                    
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <span class="inline-flex rounded-md shadow-sm">
                    <x-buttons.primary-button type="submit">
                        Update Profile
                    </x-buttons.primary-button>
                </span>
            </div>
        </div>
    </form>
</section>
