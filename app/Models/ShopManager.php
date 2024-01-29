<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopManager extends Model
{
    use HasFactory;
    protected $table = 'ShopManagers';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'Email',
        'PhoneNumber',
        'AppointmentSeparationMinutes',
        'CountryId',
        'UserId'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'Id', 'UserId');
    }
}
