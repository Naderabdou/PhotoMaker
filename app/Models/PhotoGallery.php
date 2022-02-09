<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'gallery_id'
    ];
    public function gallery(){
        return $this->belongsTo(GalleryCategory::class,'gallery_id');
    }
}
