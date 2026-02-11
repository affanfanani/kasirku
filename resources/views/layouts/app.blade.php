<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Kasir')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-md hidden md:flex flex-col">
        <div class="px-6 py-4 border-b">
            <h1 class="text-xl font-bold text-gray-800">Kasirku</h1>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                Dashboard
            </a>

            <a href="{{ route('transactions.index') }}"
                class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                Transaksi
            </a>

            <a href="{{ route('products.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                Produk
            </a>

            <a href="{{ route('customers.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                Customer
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Logout
                </a>
            </form>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    @yield('header', 'Dashboard')
                </h2>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }}
                </span>

            </div>
        </header>

        <!-- PAGE CONTENT -->
        <main class="p-6 flex-1">
            @yield('content')
        </main>

    </div>

</body>

</html>