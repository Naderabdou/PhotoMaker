<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_ar',
        'name_en',
        'contact_id'
    ];



    public function ServicesCate(){
        return $this->belongsTo(ServicesCatgory::class,'contact_id');
    }
    public function ordercontact(){
        return $this->hasMany(OrderContact::class,'service_id');
    }
}
