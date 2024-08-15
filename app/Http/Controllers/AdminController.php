<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Application;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Method to show the admin dashboard
    public function dashboard()
    {
        $vacancyCount = Vacancy::count();
        $applicationCount = Application::count();

        return view('admin.dashboard', compact('vacancyCount', 'applicationCount'));
    }
}
