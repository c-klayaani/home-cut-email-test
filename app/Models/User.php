<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'Users';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Username',
        'Password',
        'UserType',
        'Blocked'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }
}
