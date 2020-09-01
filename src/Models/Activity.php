<?php

namespace Lakasir\UserLoggingActivity\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Activity extends Model
{
    protected $fillable = [
        'ip',
        'info',
        'url',
        'referer',
        'request',
        'devices',
        'property',
    ];


    public function __construct()
    {
        $this->table = config('activity_log.table_name');
    }

    public function user()
    {
        return $this->belongsTo(config('activity_log.user_model'), 'user_id');
    }

    public function scopeGetProperty()
    {
        $property = json_decode($this->property, 1);

        return $property;
    }
}
