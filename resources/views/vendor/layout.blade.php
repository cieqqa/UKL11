<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vendor Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="h-screen flex flex-col lg:flex-row overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-white shadow-lg flex-shrink-0 lg:h-full">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-xs text-gray-500">Vendor</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('vendor.dashboard') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('vendor.dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition">
                    <i class="fas fa-chart-line w-5 mr-3"></i> Dashboard
                </a>
                <a href="{{ route('vendor.bookings') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('vendor.bookings') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition">
                    <i class="fas fa-calendar-check w-5 mr-3"></i> Pesanan
                </a>
                <a href="{{ route('vendor.profile') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('vendor.profile') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition">
                    <i class="fas fa-user w-5 mr-3"></i> Profil
                </a>
            </nav>

            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition font-medium">
                        <i class="fas fa-sign-out-alt w-5 mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Header -->
            <header class="bg-white shadow-sm sticky top-0 z-40">
                <div class="flex items-center justify-between px-8 py-4">
                    <h1 class="text-2xl font-bold text-gray-900">@yield('header', 'Dashboard')</h1>
                    <div class="flex items-center gap-6">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition">
                            <i class="fas fa-home w-5"></i>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8 min-h-[calc(100vh-5rem)]">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
