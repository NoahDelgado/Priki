<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\PublicationState;

class IndexController extends Controller
{
    public function index($nbDays)
    {
        Carbon::setlocale('fr');
        dd(Practice::getRecentUpdated($nbDays));
        return view("index")->with(['nbDays' => $nbDays, 'practices' => $practices]);
    }
}
