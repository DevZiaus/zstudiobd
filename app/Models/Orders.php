<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'file',
        'user',
        'bill',
        'eta',
        'complete_file',
        'status',
        'ps_status',
        'tr_id',
    ];

    public function userInfo() {
        return $this->belongsTo('App\Models\User', 'user', 'id');
    }

    public function osInfo() {
        return $this->belongsTo('App\Models\Orderstatus', 'status', 'os_id');
    }

    public function psInfo() {
        return $this->belongsTo('App\Models\Paymentstatus', 'ps_status', 'ps_id');
    }
}
