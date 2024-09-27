<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCountry extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'country_id',
    ];

    public $timestamps = true;

    // Relationship with Country
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
