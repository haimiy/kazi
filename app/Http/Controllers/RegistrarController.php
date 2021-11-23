<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function index()
    {
        return view('registrar.index');
    }

     public function decision()
    {
        return view('registrar.decision_create');
    }

    public function storeDecision(Request $Request)
    {
       
    }
}
