<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class about extends Controller
{
    public function show()
    {
        return view('about');
    }
}