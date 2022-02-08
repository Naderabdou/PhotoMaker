<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable=[
        'about_desc_en',
        'about_desc_ar',
        'client_title',
        'client_img'
    ];
}
