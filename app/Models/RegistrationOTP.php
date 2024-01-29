<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationOTP extends Model
{
    use HasFactory;
    protected $table = 'RegistrationOTPs';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'ClientId',
        'OTP'
    ];
}
