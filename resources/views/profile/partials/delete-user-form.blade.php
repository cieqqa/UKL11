<section class="space-y-6">
    <div class="rounded-lg border border-red-200 bg-red-50 p-4">
        <div class="flex gap-3">
            <svg class="w-5 h-5 flex-shrink-0 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <p class="text-sm font-semibold text-red-900">Perhatian!</p>
                <p class="text-sm text-red-800 mt-1">Menghapus akun adalah tindakan permanen yang tidak dapat dibatalkan. Semua data Anda akan hilang.</p>
            </div>
        </div>
    </div>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:outline-none"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Hapus Akun Selamanya
    </button>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable class="max-w-md">
        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6 p-6">
            @csrf
            @method('delete')

            <div>
                <h2 class="text-lg font-bold text-gray-900">Hapus Akun Secara Permanen</h2>
                <p class="mt-3 text-sm text-gray-600">
                    Tindakan ini tidak dapat dibatalkan. Semua data akun, riwayat pesanan, dan informasi bisnis Anda akan dihapus secara permanen dari sistem kami.
                </p>
                <p class="mt-2 text-xs text-red-600 font-semibold">Ketik password Anda untuk mengkonfirmasi penghapusan.</p>
            </div>

            <div>
                <x-input-label for="password" class="text-sm font-semibold text-gray-900" value="Password" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-3 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder-gray-500 transition focus:border-red-500 focus:ring-2 focus:ring-red-200 focus:outline-none"
                    placeholder="Masukkan password Anda"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-semibold text-gray-900 transition hover:bg-gray-50 focus:ring-2 focus:ring-gray-200 focus:outline-none"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="rounded-lg bg-red-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:outline-none"
                >
                    Ya, Hapus Akun Saya
                </button>
            </div>
        </form>
    </x-modal>
</section>
