<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog') — {{ config('app.name') }}</title>
    {{-- Tailwind via CDN (butuh internet) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="font-bold text-red-600">📝 {{ config('app.name') }}</a>
            <div class="flex gap-4 text-sm">
                <a href="{{ route('posts.index') }}"
                   class="{{ request()->routeIs('posts.index') ? 'text-red-600 font-semibold' : 'text-slate-600 hover:text-red-600' }}">
                    Semua Post
                </a>
                <a href="{{ route('posts.create') }}"
                   class="{{ request()->routeIs('posts.create') ? 'text-red-600 font-semibold' : 'text-slate-600 hover:text-red-600' }}">
                    Tulis Post
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-8 flex-1 w-full">

        {{-- Flash message (tampil sekali) --}}
        @if (session('success'))
            <x-alert type="success" class="mb-6">{{ session('success') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="danger" class="mb-6">{{ session('error') }}</x-alert>
        @endif

        {{-- Pesan umum jika validasi gagal --}}
        @if ($errors->any())
            <x-alert type="danger" class="mb-6">Periksa kembali form! Ada isian yang belum sesuai.</x-alert>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-xs text-slate-500 py-6">
        Pemrograman Web · Tugas Rutin 10 · Laravel {{ app()->version() }}
    </footer>
</body>
</html>
