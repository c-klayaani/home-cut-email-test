<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPushId extends Model
{
    use HasFactory;
    protected $table = 'ClientPushIds';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'ClientId',
        'PushId',
        'Locale'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'Id', 'ClientId');
    }
}
