<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "families";

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function advantages()
    {
        return $this->hasMany(Advantage::class);
    }
}
