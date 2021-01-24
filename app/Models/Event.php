<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    /**
     * Définit la relation "Many To Many" entre Event et Type.
     * 
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsToMany
     */
    public function types()
    {
        return $this->belongsToMany('App\Models\EventType');
    }

    public function addLatLngField()
    {
        $latLng = array();
        \array_push($latLng, $this->latitude, $this->longitude);
        $this->latLng = $latLng;
    }
}
