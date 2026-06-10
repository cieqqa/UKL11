<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div>
            <x-input-label for="name" class="text-sm font-semibold text-gray-900">Nama Lengkap</x-input-label>
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-3 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder-gray-500 transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
                placeholder="Masukkan nama lengkap Anda"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div>
            <x-input-label for="email" class="text-sm font-semibold text-gray-900">Email</x-input-label>
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-3 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder-gray-500 transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username"
                placeholder="Masukkan email Anda"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-lg bg-yellow-50 border border-yellow-200 p-4">
                    <p class="text-sm text-yellow-800">
                        <span class="font-semibold">Email belum diverifikasi</span>
                        <button form="send-verification" class="ml-2 font-semibold text-yellow-900 hover:text-yellow-700 underline">
                            Kirim ulang link verifikasi
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-semibold text-green-700">
                            ✓ Link verifikasi telah dikirim ke email Anda
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-3 pt-4">
            <button 
                type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="inline-flex items-center gap-2 text-sm font-medium text-green-700"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Profil berhasil diperbarui
                </p>
            @endif
        </div>
    </form>
</section>
