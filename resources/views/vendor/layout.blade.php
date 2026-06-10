<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vendor Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="w-full lg:w-72 bg-white border-b border-slate-200 lg:border-b-0 lg:border-r shadow-sm">
            <div class="px-6 py-7 border-b border-slate-200">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center text-lg font-semibold shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-500">Akun Vendor</p>
                    </div>
                </div>
                <p class="mt-4 text-xs text-slate-500">Kelola layanan, pesanan, dan performa dengan antarmuka yang bersih.</p>
            </div>

            <nav class="px-4 py-6 space-y-1">
                <div class="px-3 mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Navigasi</div>
                <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('vendor.dashboard') ? 'bg-slate-100 text-slate-900 shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i class="fas fa-chart-line w-4"></i>
                    Dashboard
                </a>
                <a href="{{ route('vendor.bookings') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('vendor.bookings') ? 'bg-slate-100 text-slate-900 shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i class="fas fa-calendar-check w-4"></i>
                    Pesanan
                </a>
                <a href="{{ route('vendor.my-jasa') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('vendor.my-jasa') ? 'bg-slate-100 text-slate-900 shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i class="fas fa-briefcase w-4"></i>
                    Kelola Layanan
                </a>
                <a href="{{ route('vendor.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('vendor.profile') ? 'bg-slate-100 text-slate-900 shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i class="fas fa-user w-4"></i>
                    Profil
                </a>
            </nav>

            <div class="px-6 py-5 border-t border-slate-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl border border-red-200 bg-white px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Header -->
            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-sm">
                <div class="mx-auto flex max-w-[1800px] items-center justify-between px-6 py-5">
                    <div>
                        <h1 class="text-2xl font-semibold text-slate-900">@yield('header', 'Dashboard')</h1>
                        <p class="text-sm text-slate-500">Ringkasan operasi vendor Anda dalam satu tampilan.</p>
                    </div>
                    <div class="inline-flex items-center gap-3">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                        <a href="{{ route('vendors.index') }}" class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                            <i class="fas fa-search"></i> Find Vendors
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="mx-auto max-w-[1800px] px-6 py-8">
                @if(session('success'))
                    <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 rounded-3xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-700">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
