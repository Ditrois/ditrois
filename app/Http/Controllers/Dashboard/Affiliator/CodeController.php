<?php

namespace App\Http\Controllers\Dashboard\Affiliator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index(){
        return view('dashboard.affiliator.code');
    }
}
