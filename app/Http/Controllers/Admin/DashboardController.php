<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $manager = User::where('role_as', 2)->count();
        $user = User::where('role_as', 3)->count();
        $taskCompleted = Event::where('status', 1)->count();
        $taskInCompleted = Event::where('status', 0)->count();
        return view('admin.dashboard', compact('manager','user','taskCompleted','taskInCompleted'));
    }
}
