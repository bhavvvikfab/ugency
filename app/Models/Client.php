<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // protected $table = 'clients';

    // protected $primaryKey = 'client_id';

    // Mass assignable fields
    protected $fillable = [
        'user_id',   // Foreign key from the User model
        'business_name',
        'category',
    ];

    public $timestamps = true;

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Assuming 'id' is the PK in the users table
    }


    public function clientCountries()
    {
        return $this->hasMany(ClientCountry::class, 'client_id', 'client_id');
    }

    // Relationship with ClientCity
    public function clientCities()
    {
        return $this->hasMany(ClientCity::class, 'client_id', 'client_id');
    }

    // Relationship with ClientLanguage
    public function clientLanguages()
    {
        return $this->hasMany(ClientLanguage::class, 'client_id', 'client_id');
    }
}
