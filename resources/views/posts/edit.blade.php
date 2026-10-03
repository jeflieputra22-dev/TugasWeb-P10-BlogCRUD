@extends('layouts.app')
@section('title', 'Edit Post')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>

    <x-card>
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            @include('posts._form')

            <div class="flex gap-3">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg">Perbarui</button>
                <a href="{{ route('posts.show', $post) }}" class="text-sm text-slate-600 px-4 py-2 hover:underline">Batal</a>
            </div>
        </form>
    </x-card>
@endsection
