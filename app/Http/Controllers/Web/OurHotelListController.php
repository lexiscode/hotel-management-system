<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurHotelListController extends Controller
{
    public function index()
    {
        return view('web.frontend.hotel-lists.index');
    }
}
