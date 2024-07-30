<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;
    protected $table = "playlist";

    protected $fillable = [
        'id',
        'judul_playlist',
        'slug',
        'deskripsi',
        'user_id',
        'gambar_playlist',
        'is_active',
    ];

    protected $hidden = [];
    public function user()
    {
        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
