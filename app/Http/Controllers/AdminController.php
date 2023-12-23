<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Index');
    }

    public function attributes_index(): \Inertia\Response
    {
        return Inertia::render('Admin/Attribute/Index');
    }
}
