<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $primaryKey = 'id_property';
    protected $fillable = [
        'title',
        'type',
        'price',
        'country',
        'city',
        'image',
        'description',
        'available_rooms'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}