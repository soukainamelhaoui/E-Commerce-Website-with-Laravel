<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $primaryKey = 'id_reservation';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'number',
        'guests',
        'check_in',
        'check_out',
        'special_requests'
    ];
    
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}