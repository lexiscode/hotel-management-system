<?php

namespace App\Http\Controllers\Web\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarltonHotelController extends Controller
{
    public function index()
    {
        return view('web.frontend.partners.carlton-hotel');
    }
}
