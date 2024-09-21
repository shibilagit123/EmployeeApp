<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
   //  {
   //      // ini_set('max_execution_time', 300);
   //      ini_set('MAX_EXECUTION_TIME', '-1');
   //      set_time_limit(0);
   //      $this->middleware('auth');
   //  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('home');
    }
  
}
