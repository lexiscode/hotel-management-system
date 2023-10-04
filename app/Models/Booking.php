<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Partner;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id', 'check_in', 'check_out', 'room_name',
        'room_number', 'adults', 'children',
        'price', 'guest_name', 'phone_number',
        'status', 'email', 'notes'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
