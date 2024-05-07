<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'longitude',
        'latitude',
        'location',
        'open_time',
        'close_time',
        'contact_number',
        'type',
        'user_id'
    ];
    const SERVICE_TYPES = [
        'hotel' => 'Hotel',
        'restaurant' => 'Restaurant',
        'museum' => 'Museum',
        'shopping' => 'Shopping',
        'cafe' => 'Cafe',
        'spa' => 'Spa',
        'zoo' => 'Zoo',
        'library' => 'Library',
    ];
 
    const POPULAR_CITIES = [
        'casablanca' => 'Casablanca',
        'marrakech' => 'Marrakech',
        'rabat' => 'Rabat',
        'fes' => 'Fez',
        'tangier' => 'Tangier',
        'agadir' => 'Agadir',
        'meknes' => 'Meknes',
        'essaouira' => 'Essaouira',
        'ouarzazate' => 'Ouarzazate',
        'chefchaouen' => 'Chefchaouen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
