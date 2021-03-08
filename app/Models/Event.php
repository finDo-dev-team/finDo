<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Définit la relation "Many To Many" entre Event et User.
     * 
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function addLatLngField()
    {
        $latLng = array();
        \array_push($latLng, $this->latitude, $this->longitude);
        $this->latLng = $latLng;
    }

    public function addCheckSum()
    {
        //Hash Titre (regex tout en miscule pas d'espace pas de tiret) + desc rapide 

        $hash= $this->getInfoTrimed();
        $hash2=hash('ripemd128', $hash);
        $this->checkSum= $hash2;

    }

    public function getInfoTrimed() : string

    {
        $chaine=$this->title.$this->lead_text;
        $chaine2= trim(strtolower(str_replace('.','',$chaine)));

        return $chaine2;
    }

    
}
