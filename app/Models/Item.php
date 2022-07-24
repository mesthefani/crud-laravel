<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_name',
        'item_price',
        'item_date',
        'item_number',
        'item_type',

        //MOSCA CON EL INGLES, CAMBIE LA MIGRACION Y ESO a estos campos, el ingles es al reves.. item name, item date, ...
    ];
}

