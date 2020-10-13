<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Log extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'logs';
    protected $fillable = ['user_id', 'action', 'original', 'changes'];
//    protected $fillable = ['code', 'company_id'];

}
