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
        'media_upload_id',
        'uploader_id',
        'user',
        'bill',
        'eta',
        'complete_file',
        'status',
        'ps_status',
        'tr_id',

    ];

    public function mediaInfo(){
        return $this->belongsTo(MediaUpload::class, 'media_upload_id');
    }


    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
        $order = Orders::find(1);
    }


    public function userInfo() {
        return $this->belongsTo('App\Models\User', 'uploader_id', 'id');
    }

    public function osInfo() {
        return $this->belongsTo('App\Models\Orderstatus', 'status', 'os_id');
    }

    public function psInfo() {
        return $this->belongsTo('App\Models\Paymentstatus', 'ps_status', 'ps_id');
    }
}
