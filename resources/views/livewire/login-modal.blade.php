
    <div>

        <div wire:click="openLoginModal" class="w-8 h-8 flex items-center justify-center cursor-pointer bg-transparent hover:bg-slate-200 transition duration-150 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=1.5 stroke="currentColor" class="w-6 h-6 text-slate-900">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>

        <!-- Main modal -->
        <div x-data="{ login: true, register: false, forgot: false }" id="authentication-modal" aria-hidden="true" class="@if($showModal){{ 'block' }}@else{{ 'hidden' }}@endif overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                        <div class="flex justify-end p-1">
                            <button wire:click="closeLoginModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form x-show="login" wire:submit.prevent="login" class="space-y-4 -mt-5 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                            @csrf
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                            <div>
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Username or Email</label>
                                <input wire:model="username" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required="">
                                @error('username')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Password</label>
                                <input wire:model="password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                                @error('password')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="flex justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox" class="bg-gray-50 border border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                                    </div>
                                    <div class="text-sm ml-3">
                                        <label for="remember" class="font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                                    </div>
                                </div>
                                <a href="#" @click="login = false, forgot = true" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                Not registered? <a href="#" @click="login = false, register = true" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                            </div>
                        </form>

                        <form x-show="register" class="space-y-4 -mt-5 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                            @csrf
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Register</h3>
                            <div>
                                <label for="firstname" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">First Name</label>
                                <input wire:model.lazy="firstName" type="text" name="first_name" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                                @error('firstName')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="lastname" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Last Name</label>
                                <input wire:model.lazy="lastName" type="text" name="last_name" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                                @error('lastName')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Username or Email</label>
                                <input wire:model.lazy="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                                @error('username')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Password</label>
                                <input wire:model.lazy="password" type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                                @error('password')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="confirmpassword" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Confirm Password</label>
                                <input wire:model.lazy="confirmPassword" type="password" name="confirmPassword" id="confirmpassword" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                               
                            </div>
                            
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                Already registered? <a href="#" @click="login = true, register = false" class="text-blue-700 hover:underline dark:text-blue-500">Login</a>
                            </div>
                        </form>

                        <form x-show="forgot" class="space-y-4 -mt-5 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                        @csrf
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Forgot password</h3>
                            <div>
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Email</label>
                                <input wire:model="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required="">
                                @error('email')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Email Password Reset Link</button>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                Already registered? <a href="#" @click="login = true, forgot = false" class="text-blue-700 hover:underline dark:text-blue-500">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>