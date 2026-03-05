<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    
    public function index()
    {
        $users = User::with('colocations')->get();

        return view('admin.dashboard', compact('users'));
    }
}