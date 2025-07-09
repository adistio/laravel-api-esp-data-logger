<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static function tempHumidity()
    {
        return view('pages.temphumidity');
    }
}
