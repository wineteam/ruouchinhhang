<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngTagsController extends Controller
{
    public function index(){
        return view('admin.tags');
    }
}
