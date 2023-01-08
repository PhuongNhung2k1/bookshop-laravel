<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\categories;
use Illuminate\Support\Facades\Auth;
use View;
class AdminHomeController extends Controller
{
    //

    public function __construct()
    {
        return view("backend.login-admin");
    }
    public function index()
    {
        return view("backend.home-admin");
    }
}
