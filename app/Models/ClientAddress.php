<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    use HasFactory;
    protected $table = 'ClientAddresses';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'ClientId',
        'Name',
        'CountryId',
        'City',
        'FullAddress',
        'Appartment',
        'Building',
        'FloorNb',
        'PhoneNumber',
        'Notes'
    ];
}
