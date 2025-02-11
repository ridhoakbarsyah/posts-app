<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('posts.index') }}" class="text-lg font-semibold">Dashboard</a>

                <!-- Mobile Menu Button -->
                <button id="menuToggle" class="md:hidden px-3 py-2 rounded bg-white text-blue-600">
                    ☰
                </button>

                <!-- Menu Items -->
                <div id="menuItems" class="hidden md:flex space-x-4">
                    <a href="{{ route('posts.create') }}"
                        class="px-4 py-2 bg-white text-blue-600 rounded hover:bg-blue-700 hover:text-white transition">
                        Add New
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto mt-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center py-3 mt-6">
            <p>&copy; {{ date('Y') }} Posts App</p>
        </footer>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('menuItems').classList.toggle('hidden');
        });
    </script>
</body>

</html>
