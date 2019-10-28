<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class templateController extends Controller
{
    
    public function index()
    {
        return view('dashboard.dashboard');
        
    }
    
    public function create(){
        return view('user.create');
    }
}
