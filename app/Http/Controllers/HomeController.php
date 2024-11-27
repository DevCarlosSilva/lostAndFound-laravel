<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{

    public function home()
    {
        return view('home');
    }
}
