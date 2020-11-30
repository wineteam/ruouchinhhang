<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngOrderController extends Controller
{
    public function index(){
        return view('admin.order');
    }
}
