<?php

namespace App\Models;

use App\Models\Professional\ProfessionalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = [
        'customer_id',
        'professionalService_id',
        'professional_id',
        'payment_id',
        'bookingDate',
        'bookingTime',
        'bookingAddress',
        'city',
        'pin_code',
        'additionalDetails',
        'order_status',
        'created_at',
        'updated_at'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function professionalService()
    {
        return $this->belongsTo(ProfessionalService::class, 'professionalService_id');
    }

}
