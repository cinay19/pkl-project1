<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'description', 'image',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}