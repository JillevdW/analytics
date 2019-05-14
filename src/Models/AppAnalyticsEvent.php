<?php

namespace Jvdw\Analytics\Models;

use Illuminate\Database\Eloquent\Model;

class AppAnalyticsEvent extends Model
{
    protected $fillable = [
        'device_id'
    ];

    public function metric() {
        return $this->belongsTo(AppMetric::class);
    }
}
