<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'families';

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function advantages(): HasMany
    {
        return $this->hasMany(Advantage::class);
    }
}
