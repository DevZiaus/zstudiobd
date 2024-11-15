<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // 'file' or 'link'
        'title',
        'file_path',
        'file_size',
        'mime_type',
        'external_url',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}