@extends('layouts.app')
@section('title', 'Semua Post')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <h1 class="text-3xl font-bold">Semua Post</h1>
        <a href="{{ route('posts.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + Tulis Post
        </a>
    </div>

    {{-- Bonus: pencarian (form GET tidak memerlukan @csrf) --}}
    <form method="GET" action="{{ route('posts.index') }}" class="flex gap-2 mb-6">
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari judul post..."
               class="flex-1 border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-300">
        <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white text-sm px-4 py-2 rounded-lg">Cari</button>
    </form>

    @forelse ($posts as $post)
        <x-card :title="$post->title" class="mb-4">
            <p>{{ \Illuminate\Support\Str::limit($post->body, 140) }}</p>
            <p class="text-xs text-slate-400 mt-2">Dibuat {{ $post->created_at->format('d M Y, H:i') }}</p>

            <x-slot:footer>
                <a href="{{ route('posts.show', $post) }}" class="text-red-600 hover:underline">Baca</a>
                <a href="{{ route('posts.edit', $post) }}" class="text-slate-600 hover:underline">Edit</a>

                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                      onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </x-slot:footer>
        </x-card>
    @empty
        <x-alert type="info">
            @if (request('q'))
                Tidak ada post dengan judul "{{ request('q') }}".
            @else
                Belum ada post. Klik "Tulis Post" untuk membuat yang pertama.
            @endif
        </x-alert>
    @endforelse

    {{-- Pagination otomatis --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
