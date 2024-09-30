<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $fillable = [
        'region_id',
        'country_name',
        'country_code',
    ];
    // Enable timestamps
    public $timestamps = true;

    // Define the relationship to the Region model
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public static function getAllContries()
    {
        return self::all();
    }
}
