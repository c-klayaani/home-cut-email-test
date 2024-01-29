<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentNotificationSetup extends Model
{
    use HasFactory;
    protected $table = 'AppointmentsNotificationsSetup';
    protected $primaryKey = 'Status';
    public $timestamps = false;
    protected $fillable = [
        'Title',
        'Message',
        'ArTitle',
        'ArMessage'
    ];
}
