<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'number', 'message'];

}
