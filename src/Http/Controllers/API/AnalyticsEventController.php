<?php

namespace Jvdw\Analytics\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppAnalyticsEvent;
use Jvdw\Analytics\Models\AppMetric;

use Carbon\Carbon;

class AnalyticsEventController extends Controller
{
    
    public function index() {
        return AppAnalyticsEvent::all();
    }

    public function store(Request $request) {
        $values = $request->validate([
            'device_id' => 'required|string|max:255',
            'metric_name' => 'required|string|max:255',
            'properties' => 'array'
        ]);

        $metric = AppMetric::where('name', $values['metric_name'])->firstOrFail();
        
        $event = new AppAnalyticsEvent();
        $event->device_id = $values["device_id"];
        if (isset($values['properties'])) {
            $event->properties = json_encode($values['properties']);
        }

        $metric->events()->save($event);
    }

    // Gets all events for the given metric between the given timestamps.
    public function getBetweenDates(Request $request) {
        $values = $request->validate([
            'metric_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
        
        $metric = AppMetric::where('name', $request["metric_name"])->firstOrFail();

        // Gets all events for the given metric that happened between the 00:00 at the start day
        // up to 23:59 at the end day.
        $events = $metric->events()->whereBetween('created_at', [
            Carbon::parse($request["start_date"])->setTime(0, 0, 0),
            Carbon::parse($request["end_date"])->addDays(1)->setTime(0, 0, 0)
        ])
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
        
        return $events;
    }

    // Counts all events for the given metric between the given timestamps.
    public function countBetweenDates(Request $request) {
        $values = $request->validate([
            'metric_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
        
        $metric = AppMetric::where('name', $request["metric_name"])->firstOrFail();

        // Gets all events for the given metric that happened between the 00:00 at the start day
        // up to 23:59 at the end day.
        $eventCount = $metric->events()->whereBetween('created_at', [
            Carbon::parse($request["start_date"])->setTime(0, 0, 0),
            Carbon::parse($request["end_date"])->addDays(1)->setTime(0, 0, 0)
        ])
        ->count();
        
        return [
            'metric' => $metric->name,
            'events' => $eventCount
        ];
    }

}
