<x-guest-layout>
    <x-slot:title>Login</x-slot:title>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="after:ml-0.5 after:text-red-500 after:content-['*']" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <div class="flex justify-between">
            <x-input-label for="password" :value="__('Kata Sandi')" class="after:ml-0.5 after:text-red-500 after:content-['*']" />
            @if (Route::has('password.request'))
                <a class="underline text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-zinc-800"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif
            </div>
            <x-password-input id="password" name="password" required class="mt-1 block w-full peer" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 " />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center ">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-zinc-800"
                    name="remember">
                <span class="ms-2 text-sm text-zinc-600 dark:text-zinc-400">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
