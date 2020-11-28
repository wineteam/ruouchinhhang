<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngCommentController extends Controller
{
    public function index(){
        return view('admin.comment');
    }
}
