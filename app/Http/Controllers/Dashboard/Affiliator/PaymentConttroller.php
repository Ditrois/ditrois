<?php

namespace App\Http\Controllers\Dashboard\Affiliator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentConttroller extends Controller
{
    public function index(){
        return view('dashboard.affiliator.payment');
    }
}
