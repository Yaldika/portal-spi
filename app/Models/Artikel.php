<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'slug',
        'body',
        'kategori_id',
        'user_id',
        'gambar_artikel',
        'is_active',
        'views'

    ];

    
    protected $hidden = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

   public function users()
   {
       return $this->belongsTo(User::class, 'user_id', 'id');
   }

}
