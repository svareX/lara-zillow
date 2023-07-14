<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return inertia('Index/Index');
    }

    function show()
    {
        return inertia('Index/Show');
    }
}
