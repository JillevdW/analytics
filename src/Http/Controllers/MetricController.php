<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppMetric;

class MetricController extends Controller
{
    
    public function index() {
        return AppMetric::all();
    }

    public function show($id) {
        $metric = AppMetric::findOrFail($id);
        return [
            "name" => $metric->name,
            "events" => $metric->events()->get()
        ];
    }

}
