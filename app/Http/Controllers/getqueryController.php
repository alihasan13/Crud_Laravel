<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class getqueryController extends Controller
{
    /*
     * to get the data from database using query builder 
     */
    public function index(){
       $students= DB::table('students')->get();
       return view('students',['students'=>$students]);
    }
    
 
}
