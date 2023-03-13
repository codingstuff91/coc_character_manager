<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
    protected $casts = [
        'id' => 'integer',
    ];

    public function character()
    {
        return $this->hasOne(Character::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
