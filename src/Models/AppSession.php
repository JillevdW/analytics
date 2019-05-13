<?php

namespace Jvdw\Analytics\Models;

use Illuminate\Database\Eloquent\Model;

class AppSession extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'device_id'
    ];

    public function events() {
        return $this->hasMany(AppSessionEvent::class , 'session_id');
    }
    
}
