@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="text-sm text-slate-500 hover:underline">← Kembali ke daftar</a>

    <x-card :title="$post->title" class="mt-3">
        <p class="whitespace-pre-line">{{ $post->body }}</p>
        <p class="text-xs text-slate-400 mt-4">
            Dibuat {{ $post->created_at->format('d M Y, H:i') }}
            @if ($post->updated_at->ne($post->created_at))
                · Diperbarui {{ $post->updated_at->format('d M Y, H:i') }}
            @endif
        </p>

        <x-slot:footer>
            <a href="{{ route('posts.edit', $post) }}" class="text-slate-600 hover:underline">Edit</a>

            <form method="POST" action="{{ route('posts.destroy', $post) }}"
                  onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
            </form>
        </x-slot:footer>
    </x-card>
@endsection
