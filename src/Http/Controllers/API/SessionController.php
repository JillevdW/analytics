<?php

namespace Jvdw\Analytics\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppSessionEvent;
use Jvdw\Analytics\Models\AppSession;

use Carbon\Carbon;

class SessionController extends Controller
{

    public function index() {
        return AppSession::all();
    }
    
    public function show($id) {
        $session = AppSession::findOrFail($id);
        return [
            "events" => $session->events()->get()
        ];
    }
    
    public function store(Request $request) {
        $values = $request->validate([
            'device_id' => 'required|string|max:255',
            'events' => 'required|array'
        ]);

        $startDate = $values['events'][0]['date'];
        $endDate = end($values['events'])['date'];

        info($startDate);
        info($endDate);

        $session = AppSession::create([
            'device_id' => $values['device_id'],
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        
        foreach ($values['events'] as $event) {
            $sessionEvent = new AppSessionEvent();
            $sessionEvent->event = $event['event'];
            $sessionEvent->date = $event['date'];
            $session->events()->save($sessionEvent);
        }
    }
}
