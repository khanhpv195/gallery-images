<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    
    protected $fillable = [
        'image_name',
        'url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
