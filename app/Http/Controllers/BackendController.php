<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Show admin login page.
     */
    public function showAdminLogin()
    {
        return view('backend.pages.index');
    }
    public function showDashboard()
    {
        return view('backend.pages.dashboard');
    }
}
