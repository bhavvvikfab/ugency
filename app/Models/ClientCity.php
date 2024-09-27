<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCity extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'city_id',
    ];

    public $timestamps = true;

    // Relationship with City
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
