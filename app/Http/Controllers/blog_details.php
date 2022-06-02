<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class blog_details extends Controller
{
    public function show()
    {
        return view('blog_details');
    }
}