<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        $title = "CRUD";
        return view('welcome', compact('title'));
    }
}
