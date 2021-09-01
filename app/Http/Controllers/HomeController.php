<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function features()
    {
    	return view ('home.features', ['app_name' => 'Noteni']);
    }

    public function about()
    {
    	return view ('home.about', ['app_name' => 'Noteni']);
    }

}
