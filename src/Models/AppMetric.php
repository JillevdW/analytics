<?php

namespace Jvdw\Analytics\Models;

use Illuminate\Database\Eloquent\Model;

class AppMetric extends Model
{
    public $timestamps = false;

    public function events() {
        return $this->hasMany(AppAnalyticsEvent::class, 'metric_id');
    }
    
}
