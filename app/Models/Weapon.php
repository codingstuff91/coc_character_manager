<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'category',
        'damage_score',
        'range',
    ];
    protected $casts = [
        'id'       => 'integer',
        'name'     => 'string',
        'category' => 'string',
        'range'    => 'integer',
    ];
}
