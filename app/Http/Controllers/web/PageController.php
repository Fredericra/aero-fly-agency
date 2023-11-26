<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return inertia('Home');
    }
}
