<?php

namespace Jvdw\Analytics\Models;

use Illuminate\Database\Eloquent\Model;

class AppSessionEvent extends Model
{
    public $timestamps = false;

    public function session() {
        return $this->belongsTo(AppSession::class);
    }
}
