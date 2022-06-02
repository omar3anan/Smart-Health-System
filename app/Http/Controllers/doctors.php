<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class doctors extends Controller
{
    public function show()
    {
        return view('doctors');
    }
}