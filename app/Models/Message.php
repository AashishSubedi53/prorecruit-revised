<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $guarded = ['id'];
    


    public function sender()
    {
        return $this->belongsTo(Customer::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(Professional::class, 'recipient_id');
    }

    // public function customer(){
    //     return $this->belongsTo(Customer::class,)
    // }
}
