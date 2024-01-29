<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'Services';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'CountryId',
        'Name',
        'Description',
        'ArName',
        'ArDescription',
        'Price',
        'Duration',
        'Order',
        'IsChecked',
        'Active'
    ];
}
