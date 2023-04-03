<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function index()
    {
        return view('pages/dashboard/dashboard');
    }
}
