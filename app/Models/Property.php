<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $primaryKey = 'id_property';
    protected $fillable = [
        'title',
        'type',
        'price',
        'location',
        'image',
        'description',
        'available_rooms'
    ];
}
