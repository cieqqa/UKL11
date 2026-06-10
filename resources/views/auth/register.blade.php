<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-semibold text-slate-900">Buat Akun Baru</h1>
        <p class="mt-3 text-sm text-slate-500 max-w-md mx-auto">Isi informasi berikut untuk mendaftar dan mulai menggunakan layanan kami dengan pengalaman yang lebih profesional.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-slate-400 focus:ring-slate-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-slate-400 focus:ring-slate-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="password" :value="__('Password')" />
            <div class="w-full" style="position: relative;">
                <x-text-input id="password" class="block mt-1 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 pr-12 text-sm focus:border-slate-400 focus:ring-slate-300" type="password" name="password" required autocomplete="new-password" />
                <button type="button" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); z-index: 10;" class="flex items-center justify-center text-slate-400 hover:text-slate-600 transition" onclick="togglePassword('password','registerEyeShow','registerEyeHide')">
                    <svg id="registerEyeShow" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <svg id="registerEyeHide" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a18.09 18.09 0 0 1 5.06-5.94" />
                        <path d="M1 1l22 22" />
                        <path d="M10.58 10.58A3 3 0 0 0 13.42 13.42" />
                        <path d="M9.88 5.38A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a17.63 17.63 0 0 1-2.35 3.74" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="w-full" style="position: relative;">
                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 pr-12 text-sm focus:border-slate-400 focus:ring-slate-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                <button type="button" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); z-index: 10;" class="flex items-center justify-center text-slate-400 hover:text-slate-600 transition" onclick="togglePassword('password_confirmation','confirmEyeShow','confirmEyeHide')">
                    <svg id="confirmEyeShow" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <svg id="confirmEyeHide" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a18.09 18.09 0 0 1 5.06-5.94" />
                        <path d="M1 1l22 22" />
                        <path d="M10.58 10.58A3 3 0 0 0 13.42 13.42" />
                        <path d="M9.88 5.38A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a17.63 17.63 0 0 1-2.35 3.74" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a class="text-sm text-slate-600 hover:text-slate-900 transition" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            <x-primary-button class="w-full sm:w-auto justify-center py-3 text-sm">{{ __('Register') }}</x-primary-button>
        </div>
    </form>
</x-guest-layout>
