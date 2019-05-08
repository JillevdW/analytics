<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppAnalyticsEvent;
use Jvdw\Analytics\Models\AppMetric;

class AnalyticsEventController extends Controller
{
    
    public function index() {
        return AppAnalyticsEvent::all();
    }

    public function store(Request $request) {
        $values = $request->validate([
            'device_id' => 'required|string|max:255',
            'metric_name' => 'required|string|max:255'
        ]);

        $metric = AppMetric::where('name', $values['metric_name'])->firstOrFail();
        
        $event = new AppAnalyticsEvent();
        $event->device_id = $values["device_id"];

        $metric->events()->save($event);
    }

}
