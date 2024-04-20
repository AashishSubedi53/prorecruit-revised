<?php

namespace App\Models\Professional;

use App\Models\Order;
use App\Models\Professional;
use App\Models\RatingAndReview;
use App\Models\Service as ModelsService;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalService extends Model
{
    use HasFactory;

    // protected $table = 'professional_services';
    protected $guarded = ['id'];

    public function professional(){
        return $this->belongsTo(Professional::class);
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function service()
    {
        return $this->belongsTo(ModelsService::class, 'service_id');
    }

    public function ratingAndReview(){
        return $this->hasMany(RatingAndReview::class, 'professional_service_id');
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }

}
