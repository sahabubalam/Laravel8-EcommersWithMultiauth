<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function adminIndex()
    {
        return view('admin.adminhome');
    }
    //
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->to('admin-login');
    }
}
