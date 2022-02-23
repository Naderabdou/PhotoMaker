<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCatgory extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_ar',
        'name_en'
    ];
    public function Services(){
        return $this->hasMany(ServicesContact::class,'contact_id');
    }
}
