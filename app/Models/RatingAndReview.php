<?php

namespace App\Models;

use App\Models\Professional\ProfessionalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingAndReview extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function professional(){
        return $this->belongsTo(Professional::class);
    }

    public function professionalService(){
        return $this->belongsTo(ProfessionalService::class);
    }

}
