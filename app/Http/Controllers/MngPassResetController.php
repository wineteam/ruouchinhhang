<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngPassResetController extends Controller
{
    public function index(){
        return view('admin.Passreset');
    }
}
