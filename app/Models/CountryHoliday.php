<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryHoliday extends Model
{
    use HasFactory;
    protected $table = 'CountryHolidays';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'CountryId',
        'HolidayName',
        'HolidayDate'
    ];
}
