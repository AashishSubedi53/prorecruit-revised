<?php

namespace App\Models\Professional;

use App\Models\Professional;
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

}
