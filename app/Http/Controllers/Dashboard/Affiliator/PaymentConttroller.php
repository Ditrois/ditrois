<?php

namespace App\Http\Controllers\Dashboard\Affiliator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliator;
use App\Models\AffiliatorWithdrawal;
use Illuminate\Support\Facades\Auth;


class PaymentConttroller extends Controller
{
    public function index(){
        $userId = Auth::id();
        $affiliator = Affiliator::where('id_user', $userId)->get()->first();

        $withdraws = AffiliatorWithdrawal::where('id_affiliator', $affiliator->id)->get();

        return view('dashboard.affiliator.payment', compact('withdraws', 'affiliator'));
    }

    public function show($id){
        $withdraw = AffiliatorWithdrawal::find($id);

        return view('dashboard.affiliator.payment_detail', compact('withdraw'));
    }

    public function edit(){
        $userId = Auth::id();
        $affiliator = Affiliator::where('id_user', $userId)->get()->first();
        return view('dashboard.affiliator.payment_edit_norek', compact('affiliator'));
    }

    public function update(Request $request){
        $userId = Auth::id();
        $affiliator = Affiliator::where('id_user', $userId)->get()->first();

        $data = $request->all();
        
        $affiliator->update($data);
        return redirect ('/dashboard/affiliator/payment');
    }

    public function store(Request $request){
        $userId = Auth::id();
        $affiliator = Affiliator::where('id_user', $userId)->get()->first();
        if($affiliator->saldo < $request->amount){
            return redirect ('/dashboard/affiliator/payment');
        }else{
            $affiliator->saldo = $affiliator->saldo - $request->amount;
            $affiliator->save();
            AffiliatorWithdrawal::create([
                'id_affiliator' => $affiliator->id,
                'amount' => $request->amount,
                'bank' => $affiliator->bank,
                'nama' => $affiliator->nama,
                'no_rekening' => $affiliator->no_rekening,
                'status' => 'pending',
            ]);
            return redirect ('/dashboard/affiliator/payment');
        }
    }

    
}
