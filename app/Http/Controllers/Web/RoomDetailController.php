<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomDetailController extends Controller
{
    public function show()
    {
        return view('web.frontend.room-details.index');
    }
}
