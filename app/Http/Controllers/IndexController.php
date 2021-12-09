<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\PublicationState;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index($nbDays)
    {
        setlocale(LC_TIME, 'French');
        $practices = Practice::getRecentPublisedUpdated($nbDays);
        return view("index")->with(['nbDays' => $nbDays, 'practices' => $practices]);
    }
}
