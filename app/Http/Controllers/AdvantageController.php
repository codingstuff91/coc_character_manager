<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Family;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvantageController extends Controller
{
    public function indexByFamily(Family $family): Collection
    {
        return $family->advantages;
    }
}
