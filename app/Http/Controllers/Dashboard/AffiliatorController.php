<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class AffiliatorController extends Controller
{
    public function index(){
        
        $userId = Auth::id();
        $aff = Affiliator::where('id_user', $userId)->get()->first();

        $transactions = Transaction::where('id_affiliator', $aff->id)->get();
        $transactionCount = $transactions->count();

        $unpaidTransaction = Transaction::where('id_affiliator', $aff->id)->where('status', 'pending')->get();
        $unpaidTransactionCount = $unpaidTransaction->count();

        $transactionSum = Transaction::where('id_affiliator', $aff->id)->where('status', '<>', 'pending')->where('status', '<>', 'rejeced')->where('status', '<>', 'refund')->sum('total');
        $unpaidTransactionSum = Transaction::where('id_affiliator', $aff->id)->where('status', '=', 'pending')->sum('total');

        return view('dashboard.affiliator.index', compact('aff', 'transactionCount', 'transactionSum'));
    }
}
