<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectorController extends Controller
{
    public function index()
    {
        return view('inspector.index');
    }

    public function comments()
    {
        return view('inspector.comments_create');
    }

     public function storeComments(Request $Request)
    {
       
    }
}
