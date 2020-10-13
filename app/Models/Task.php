<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'status', 'board_id', 'user_id', 'created_by'
    ];

    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Models\Label');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }

}
