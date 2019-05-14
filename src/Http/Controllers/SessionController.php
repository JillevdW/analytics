<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// use Jvdw\Analytics\Models\AppSessionEvent;
use Jvdw\Analytics\Models\AppSession;

class SessionController extends Controller
{

    public function index() {
        $sessions = AppSession::all();
        return view('app-analytics::session.index', compact('sessions'));
    }
    
    public function show($id) {
        $session = AppSession::findOrFail($id);
        return [
            "events" => $session->events()->get()
        ];
    }
}
