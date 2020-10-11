<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TravelPackage extends Model
{
    use softDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'language',
        'foods', 'departure_date', 'titik_kumpul' ,'duration', 'type', 'price'
    ];

    protected $hidden =[

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
        // relasi dgn tabel Gallery
    }

    public function pictures(){
        return $this->hasMany(Picture::class, 'travel_packages_id', 'id');
        // relasi dgn tabel Picture
    }
}
