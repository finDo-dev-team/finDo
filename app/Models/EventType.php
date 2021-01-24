<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    /**
     * Définit la relation "Many To Many" entre Type et Event.
     * 
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsToMany
     */
    public function events()
    {
        return $this->belongsToMany('App\Models\Event');
    }
}
