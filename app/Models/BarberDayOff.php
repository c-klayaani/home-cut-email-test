<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarberDayOff extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected $table = 'BarberDaysOff';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'BarberId',
        'OffDate'
    ];

    public function manager()
    {
        // For foreign key issues: https://github.com/staudenmeir/belongs-to-through/issues/64 
        return $this->belongsToThrough(
            'App\Models\ShopManager',
            'App\Models\Barber',
            null,
            '',
            ['App\Models\ShopManager' => 'ShopManagerId', 'App\Models\Barber' => 'BarberId']
        );
    }
}
