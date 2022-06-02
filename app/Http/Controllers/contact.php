<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class contact extends Controller
{
    public function show()
    {
        return view('contact');
    }
}