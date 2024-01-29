<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;
    protected $table = 'Barbers';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'ArName',
        'Description',
        'ArDescription',
        'Email',
        'PhoneNumber',
        'Photo',
        'ShopManagerId',
        'CountryId',
        'UserId',
        'Order',
        'Location',
        'BufferTime',
        'Blocked',
        'ArLocation',
        'PhotoPreview',
        'WorkFrom',
        'WorkTill'
    ];

    public function services()
    {
        return $this->hasManyThrough(
            Service::class,
            BarberService::class,
            'BarberId',
            'Id',
            'Id',
            'ServiceId'
        )->orderBy('Order');
    }

    public function daysoff()
    {
        return $this->hasMany(
            BarberDayOff::class,
            'BarberId'
        );
    }

    public function user()
    {
        return $this->hasOne(User::class, 'Id', 'UserId');
    }
}
