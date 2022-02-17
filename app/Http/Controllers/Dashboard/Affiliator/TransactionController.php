<?php

namespace App\Http\Controllers\Dashboard\Affiliator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Affiliator;

class TransactionController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $affiliator = Affiliator::where('id_user', $userId)->get()->first();
        $transactions = Transaction::where('id_affiliator', $affiliator->id)->get();
        $transactionCount = $transactions->count();

        $unpaidTransaction = Transaction::where('id_affiliator', $affiliator->id)->where('status', 'pending')->get();
        $unpaidTransactionCount = $unpaidTransaction->count();

        $transactionSum = Transaction::where('id_affiliator', $affiliator->id)->where('status', '<>', 'pending')->where('status', '<>', 'rejeced')->where('status', '<>', 'refund')->sum('total');
        $unpaidTransactionSum = Transaction::where('id_affiliator', $affiliator->id)->where('status', '=', 'pending')->sum('total');

        return view('dashboard.affiliator.transaction', 
            compact('transactions',
                'transactionCount',
                'unpaidTransactionCount',
                'transactionSum',
                'unpaidTransactionSum'));
    }
}
