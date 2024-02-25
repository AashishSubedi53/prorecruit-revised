<?php

namespace App\Models\Professional;

use App\Models\Professional;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'alt', 'professional_id'];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}
