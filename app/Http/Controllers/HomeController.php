<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        }else {
            return view('user.dashboard');
        }
    }
}
