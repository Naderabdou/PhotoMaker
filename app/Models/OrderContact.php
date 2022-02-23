<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'contact_id',
        'services'
    ];
    protected $casts=[
        'services'=>'json'
    ];
    public function contact(){
        return $this->belongsTo(Contact::class,'contact_id');

    }
   /* public function setPropertiesAttribute($value)
    {
        $properties = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $properties[] = $array_item;
            }
        }

        $this->attributes['properties'] = json_encode($properties);
    }

    /* public function services(){
         return $this->belongsTo(ServicesContact::class,'service_id');
     }*/
}
