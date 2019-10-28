<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestController extends Controller
{
    public function index(Request $request){
        echo "welcome ".$request->segment(1)." you are ".$request->segment(2)." years old.";
    }
}
