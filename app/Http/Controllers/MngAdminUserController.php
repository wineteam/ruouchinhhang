<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngAdminUserController extends Controller
{
    public function index(){
        return view('admin.AdminUser');
    }
}
