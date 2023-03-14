<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeCharacter extends Pivot
{
    protected $guarded = [];
    protected $table = 'attribute_character';
    public $timestamps = false;
}
