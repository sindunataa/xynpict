<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;

    protected $fillable = [
    'title', 'slug', 'status', 'desc'
    ];

    public function galeries()
    {
        return $this->hasMany(Galeries::class, 'albums_id');
    }
}
