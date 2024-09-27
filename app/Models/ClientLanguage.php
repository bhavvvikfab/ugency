<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'language_id',
    ];

    // Enable timestamps
    public $timestamps = true;

    // Relationship with Language
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
