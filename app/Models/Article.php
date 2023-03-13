<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Article extends Model
{
    use HasFactory;

    protected $fillable =[
        'articles',
        'title',
        'content',
        'short_text',
        'image_path',
        'view_count',
        'is_published',
        'author_id'
    ];

    // JOIN
    public function author() // Получение пользователя привязанного к бд
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function getImageUrlAttribute()
    {
        return url(Storage::url($this->image_path));
    }
}
