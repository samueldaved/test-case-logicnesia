<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //return home page
    public function home() {
        return view('app.home');
    }


}
