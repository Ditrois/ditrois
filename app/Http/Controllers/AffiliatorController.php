<?php

namespace App\Http\Controllers;

use App\Models\Affiliator;
use App\Models\AffiliatorWithdrawal;
use Illuminate\Http\Request;

class AffiliatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliators = Affiliator::all();
        $affiliatorWithdrawals = AffiliatorWithdrawal::where('status', '=', 'pending')->get();
        $affiliatorCount = Affiliator::all()->count();
        
        $unpaidBalance = AffiliatorWithdrawal::where('status', '=', 'pending')->sum('amount');


        return view('dashboard.admin.affiliators', compact('affiliatorWithdrawals', 'affiliators', 'affiliatorCount', 'unpaidBalance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affiliator  $affiliator
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliator $affiliator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affiliator  $affiliator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdraw = AffiliatorWithdrawal::find($id);
        return view('dashboard.admin.affiliator_edit', compact('withdraw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affiliator  $affiliator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $withdraw = AffiliatorWithdrawal::find($id);
        if(is_null($request->withdraw_proof)){
        }else{
            $file = $request->file('withdraw_proof');
            $path = 'affiliate/withdraw';
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($path,$nama_file);
            $withdraw->withdraw_proof = $nama_file;
        }
        $withdraw->status = 'success';
        $withdraw->save();
        return redirect ('/dashboard/admin/affiliator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affiliator  $affiliator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affiliator $affiliator)
    {
        //
    }
}
