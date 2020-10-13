<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['desktop_path', 'mobile_path' ,'task_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
