<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'worker_id', 'accepted', 'notes'];

    // 派遣情報に関連するイベント
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // 派遣情報に関連する人材
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}

