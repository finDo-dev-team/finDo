<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'date',
        'description'
    ];

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

    public function getLatLng()
    {
        $rtr = array();
        \array_push($rtr, $this->latitude, $this->longitude);
        return $rtr;
    }
}
