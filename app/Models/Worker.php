<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'notes'];

    // 人材に関連する派遣情報
    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }
}

