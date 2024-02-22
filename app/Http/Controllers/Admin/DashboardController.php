<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // PRENDIAMO LA DASHBOARDCONTROLLER
    public function index(){
        return view('admin.index');
    }
}
