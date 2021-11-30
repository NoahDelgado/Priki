<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index($practice)
    {
        return view("practice")->with(['practice' => $practice]);
    }
}
