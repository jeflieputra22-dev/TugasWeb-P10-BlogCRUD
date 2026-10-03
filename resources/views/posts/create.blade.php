@extends('layouts.app')
@section('title', 'Tulis Post')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Tulis Post Baru</h1>

    <x-card>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            @include('posts._form')

            <div class="flex gap-3">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg">Simpan</button>
                <a href="{{ route('posts.index') }}" class="text-sm text-slate-600 px-4 py-2 hover:underline">Batal</a>
            </div>
        </form>
    </x-card>
@endsection
