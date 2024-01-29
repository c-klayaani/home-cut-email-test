<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'Clients';
    protected $primaryKey = 'Id';
    public $timestamps = true;
    protected $fillable = [
        'Name',
        'ArName',
        'Email',
        'PhoneNumber',
        'Password',
        'CountryId',
        'Blocked',
        'PhoneVerified'
    ];

    public function addresses()
    {
        return $this->hasMany(
            ClientAddress::class,
            'ClientId'
        );
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'Id', 'CountryId');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }
}