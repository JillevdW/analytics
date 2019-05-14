<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppAnalyticsEvent;

class AnalyticsEventController extends Controller
{

    public function index() {
        $events = AppAnalyticsEvent::orderBy('created_at', 'desc')->take(100)->get();
        return view('app-analytics::event.index', compact('events'));
    }
    
}
