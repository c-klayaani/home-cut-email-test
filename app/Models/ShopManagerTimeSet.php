<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopManagerTimeSet extends Model
{
    use HasFactory;
    protected $table = 'ShopManagerTimeSets';
    protected $primaryKey = 'ShopManagerId';
    public $timestamps = false;
    protected $fillable = [
        'ShopManagerId',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];
}
