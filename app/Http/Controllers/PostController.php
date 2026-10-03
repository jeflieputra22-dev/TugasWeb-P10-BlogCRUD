<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Throwable;

// Dibuat dengan: php artisan make:model Post -mcr  (controller resource, 7 method)
class PostController extends Controller
{
    /** GET /posts — daftar post + pencarian + pagination */
    public function index(Request $request)
    {
        $posts = Post::latest()
            ->search($request->query('q'))
            ->paginate(6)
            ->withQueryString(); // supaya kata pencarian tidak hilang saat pindah halaman

        return view('posts.index', compact('posts'));
    }

    /** GET /posts/create — form tambah */
    public function create()
    {
        return view('posts.create');
    }

    /** POST /posts — validasi, simpan, redirect + flash */
    public function store(Request $request)
    {
        Post::create($this->validated($request));

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    /** GET /posts/{post} — Route Model Binding: $post otomatis diambil dari database (404 jika tidak ada) */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /** GET /posts/{post}/edit — form edit */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /** PUT /posts/{post} — validasi, update, redirect + flash */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validated($request));

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post berhasil diperbarui!');
    }

    /** DELETE /posts/{post} — hapus, redirect + flash */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (Throwable $e) {
            return redirect()->route('posts.index')
                ->with('error', 'Post gagal dihapus. Silakan coba lagi.');
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus!');
    }

    /**
     * Aturan validasi dipakai bersama oleh store() dan update().
     * Jika gagal: Laravel otomatis redirect balik + mengirim $errors + menyimpan old input.
     */
    private function validated(Request $request): array
    {
        return $request->validate(
            [
                'title' => ['required', 'string', 'max:200'],
                'body'  => ['required', 'string', 'min:10'],
            ],
            [
                'required' => ':attribute wajib diisi.',
                'max'      => ':attribute maksimal :max karakter.',
                'min'      => ':attribute minimal :min karakter.',
            ],
            [
                'title' => 'Judul',
                'body'  => 'Isi post',
            ]
        );
    }
}
