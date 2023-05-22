<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        return view("page.super_admin.dashboard");
    }

    public function dashboard_wadir()
    {
        return view("page.wadir.dashboard");
    }

    public function dashboard_ormawa()
    {
        return view("page.ormawa.dashboard");
    }
}
