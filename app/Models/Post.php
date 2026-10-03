<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

// Dibuat dengan: php artisan make:model Post -mcr
class Post extends Model
{
    // Kolom yang boleh diisi lewat Post::create() / $post->update() (mass assignment)
    protected $fillable = ['title', 'body'];

    /**
     * Bonus pencarian: Post::search('kata')
     * Logika query ditaruh di Model supaya controller tetap bersih.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        return $query->when($term, function (Builder $q, string $term) {
            $q->where('title', 'like', "%{$term}%");
        });
    }
}
