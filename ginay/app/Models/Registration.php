<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'gallery_id', 'name', 'number', 'umkm',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
