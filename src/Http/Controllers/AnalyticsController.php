<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\Analytics;

class AnalyticsController extends Controller
{
    
    public function index() {
        return Analytics::all();
    }

}
