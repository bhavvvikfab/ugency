<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';

    protected $fillable = [
        'country_id',
        'city_name',
        'city_code',
    ];

    public $timestamps = true;

     // Define the relationship to the Country model
     public function country()
     {
         return $this->belongsTo(Country::class, 'country_id', 'id');
     }

     public static function getAllCities(){
        return self::all();
     }
}
