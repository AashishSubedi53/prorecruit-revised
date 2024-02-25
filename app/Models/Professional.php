<?php

namespace App\Models;

use App\Models\Professional\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
