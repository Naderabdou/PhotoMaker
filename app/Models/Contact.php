<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_name',
        'type',
        'phone',
        'email',
        'file',
        'other',
        'photo',
        'status'

    ];

    public function Services(){
        return $this->belongsTo(ServicesCatgory::class,'contact_id');
    }
    public function ordercontact(){
        return $this->hasMany(OrderContact::class,'contact_id');
    }
}
