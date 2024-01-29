<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'Countries';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'ArName',
        'Code',
        'CurrrencyCode',
        'ArCurrrencyCode'
    ];

    public function holidays()
    {
        return $this->hasMany(
            CountryHoliday::class,
            'CountryId'
        )->orderBy('HolidayDate');
    }
}
