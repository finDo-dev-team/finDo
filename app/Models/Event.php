<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Définit la relation "Many To Many" entre Event et Type.
     * 
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsToMany
     */
    protected $fillable = [
        'title',
        'location',
        'date',
        'description'
         ];
}
