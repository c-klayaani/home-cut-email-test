<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarberService extends Model
{
    use HasFactory;
    protected $table = 'BarberServices';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'BarberId',
        'ServiceId'
    ];

    public function service()
    {
        return $this->hasOne(Service::class, 'Id', 'ServiceId');
    }
}
