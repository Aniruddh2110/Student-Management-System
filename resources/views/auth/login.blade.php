<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-red-100 via-white to-red-50 px-4 py-8 overflow-hidden">
        <div class="w-full max-w-md p-8 bg-white rounded-3xl shadow-2xl border border-red-200">
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-20 h-20 mb-3 rounded-full shadow-lg">
                <h2 class="text-2xl font-bold text-red-700 mb-1">Login</h2>
                <p class="text-sm text-gray-500">Sign in to your account</p>
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center">
                @csrf

                <div class="mb-4 w-[300px]">
                    <x-label for="email" value="{{ __('Email') }}" class="text-red-700 font-semibold" />
                    <x-input id="email"
                             class="mt-1 w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-300"
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-4 w-[300px]">
                    <x-label for="password" value="{{ __('Password') }}" class="text-red-700 font-semibold" />
                    <x-input id="password"
                             class="mt-1 w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-300"
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="w-[300px] flex justify-between items-center mb-4 text-sm text-gray-600">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-red-600 hover:underline font-medium" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <div class="w-[300px]">
                    <x-button class="w-full justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded-xl shadow-md transition-all duration-300">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-red-600 font-medium hover:underline">Register here</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
