<?php

namespace App\Models;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = ['partner_id', 'name', 'email', 'number', 'message'];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

}
