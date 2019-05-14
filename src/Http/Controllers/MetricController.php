<?php

namespace Jvdw\Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jvdw\Analytics\Models\AppMetric;

class MetricController extends Controller
{

    public function index() {
        // Temporary workaround for the bug in Laravel
        $metrics = AppMetric::orderBy('id', 'asc')->get();
        return view('app-analytics::metrics.index', compact('metrics'));
    }
    
    public function show($id) {
        $metric = AppMetric::findOrFail($id);
        return view('app-analytics::metrics.show', compact('metric'));
    }
}
