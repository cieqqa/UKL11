<nav x-data="{ open: false }" class="sticky top-0 z-40 shadow-sm" style="background: rgba(15, 34, 87, 0.96); border-bottom: 1px solid rgba(255, 255, 255, 0.12);">
    @php
        $profileRoute = Auth::user()->role === 'vendor' ? route('vendor.profile') : route('profile.edit');
    @endphp

    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-4">
            
            <!-- SISI KIRI: Logo Utama (Kotak K Diperlebar Menjadi Persegi Sempurna) -->
<div class="flex items-center">
    <a href="{{ url('/redirect') }}" class="flex items-center gap-3 rounded-2xl px-3 py-2 text-white transition hover:bg-white/10">
        <!-- Menambahkan w-11, max-h-11, dan aspect-square agar pasti melebar membentuk kotak sempurna -->
        <div class="flex h-11 w-11 aspect-square items-center justify-center rounded-xl text-base font-bold text-white shadow-[0_4px_12px_rgba(59,130,246,0.3)]" 
             style="background: linear-gradient(135deg, #38bdf8, #3b82f6, #6366f1); max-height: 2.75rem;">
            <span>K</span>
        </div>
        <span class="text-[1.15rem] font-semibold tracking-tight text-white">Klik n Clean</span>
    </a>
</div>


            <!-- SISI KANAN: Menu Navigasi + Dropdown Kapsul (Tanpa Inisial Huruf P) -->
            <div class="hidden sm:flex sm:items-center sm:gap-8">
                
                <!-- Menu Navigasi Utama -->
                <div class="flex items-center gap-6">
                    <a href="{{ url('/') }}" class="text-sm font-medium text-white transition hover:text-slate-200">Beranda</a>
                    <a href="{{ route('vendors.index') }}" class="text-sm font-medium text-white transition hover:text-slate-200">Find Vendors</a>
                </div>

                <!-- Bagian Dropdown Profil Kapsul -->
                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/20">
                                <!-- Inisial lingkaran huruf 'P' dihapus agar bersih sesuai contoh gambar -->
                                <span class="text-white">{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-white ms-1" xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="$profileRoute">
                                Profil Saya
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm leading-5 text-slate-900 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 transition duration-150">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            </div>

            <!-- Hamburger Menu (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-slate-200 hover:bg-white/10 focus:outline-none focus:bg-white/10 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-white/10 bg-[#08143A]/95 sm:hidden">
        <div class="space-y-1 px-3 py-3">
            <a href="{{ url('/') }}" class="block rounded-xl px-3 py-2 text-white hover:bg-white/10">Beranda</a>
            <a href="{{ route('vendors.index') }}" class="block rounded-xl px-3 py-2 text-white hover:bg-white/10">Find Vendors</a>
        </div>

        <div class="pt-4 pb-1 border-t border-white/10">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-300">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="$profileRoute">
                    Profil Saya
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left rounded-xl px-3 py-2 text-sm text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
