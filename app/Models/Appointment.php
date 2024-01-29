<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'Appointments';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'ClientId',
        'BarberId',
        'AddressId',
        'LocationCoordinates',
        'AppointmentDate',
        'Timeslot',
        'CurCode',
        'Status',
        'PaymentMethod',
        'CancelationReason',
        'Notes'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'Id', 'ClientId');
    }

    public function barber()
    {
        return $this->hasOne(Barber::class, 'Id', 'BarberId');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'Id', 'CountryId');
    }

    public function details()
    {
        return $this->hasMany(
            AppointmentDetail::class,
            'AppointmentId'
        );
    }
}
