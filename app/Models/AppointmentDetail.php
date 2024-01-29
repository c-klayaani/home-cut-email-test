<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{
    use HasFactory;
    protected $table = 'AppointmentDetails';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'AppointmentId',
        'ServiceId',
        'Quantity',
        'Price',
        'Duration'
    ];

    public function service()
    {
        return $this->hasOne(Service::class, 'Id', 'ServiceId');
    }
}
