<?php

namespace App\Models;

use App\Models\Professional\Gallery;
use App\Models\Professional\ProfessionalService;
use App\Models\Professional\Service;
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

    public function service(){
        return $this->hasMany(ProfessionalService::class);
    }

    public function address(){
        return $this->hasOne(ProfessionalAddress::class);
    }
}
