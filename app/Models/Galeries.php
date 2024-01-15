<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'status', 'content', 'image', 'albums_id'
    ];

    public function albums()
    {
        return $this->belongsTo(Albums::class, 'album_id', 'id');
    }
}
