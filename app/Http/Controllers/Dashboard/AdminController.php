<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\AffiliatorWithdrawal;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\Wedding;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $transactions = Transaction::all();
        $serviceCount = Service::all()->count();
        $weddingCount = Wedding::all()->count();
        $affiliatorCount = Affiliator::all()->count();
        $affiliatorWithdrawals = AffiliatorWithdrawal::where('status', '=', 'pending')->get();
        return view('dashboard.index', compact('transactions', 'affiliatorWithdrawals', 'serviceCount', 'weddingCount', 'affiliatorCount'));
    }
}
