<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Portfolio') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-950 text-gray-100 font-sans antialiased">

    <nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-gray-900/80 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-400">
                &lt;Portfolio /&gt;
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"     class="text-gray-300 hover:text-indigo-400 transition">Home</a>
                <a href="{{ route('projects') }}" class="text-gray-300 hover:text-indigo-400 transition">Projects</a>
                <a href="{{ route('contact') }}"  class="text-gray-300 hover:text-indigo-400 transition">Contact</a>
                <a href="/admin" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-medium transition">
                    Admin
                </a>
            </div>
            <button @click="open = !open" class="md:hidden text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        <div x-show="open" x-transition class="md:hidden bg-gray-900 border-b border-gray-800 px-6 py-4 flex flex-col gap-4">
            <a href="{{ route('home') }}"     class="text-gray-300 hover:text-indigo-400">Home</a>
            <a href="{{ route('projects') }}" class="text-gray-300 hover:text-indigo-400">Projects</a>
            <a href="{{ route('contact') }}"  class="text-gray-300 hover:text-indigo-400">Contact</a>
            <a href="/admin"                  class="text-indigo-400 font-medium">Admin</a>
        </div>
    </nav>

    <main class="pt-16">
        {{ $slot }}
    </main>

    <footer class="border-t border-gray-800 py-8 mt-20">
        <div class="max-w-6xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Portfolio. Dibangun dengan Laravel + Livewire + Filament V3.</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>