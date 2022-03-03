<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('dashboard.admin.transactions', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $packages = ServicePackage::all();
        $themes = Theme::all();
        return view('dashboard.admin.transaction_new', compact('services', 'packages', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $validator = Validator::make(
            $data,
            [
                'id_service' => ['required'],
                'id_package' => ['required'],
                'id_theme' => ['required'],
                'customer_name' => ['required', 'string', 'min:5'],
                'customer_phone_number' => ['required', 'string', 'min:10'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $total = ServicePackage::where('id', $data['id_package'])->get()->first();
            $data['total'] = $total->price;
            $data['status'] = "pending";

            Transaction::create($data);

            return redirect ('/dashboard/admin/transaction')->with(['success' => 'Transaksi Baru Berhasil Dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $services = Service::all();
        $packages = ServicePackage::all();
        $themes = Theme::all();

        return view('dashboard.admin.transaction_edit', compact('transaction', 'services', 'packages', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'id_service' => ['required'],
                'id_package' => ['required'],
                'id_theme' => ['required'],
                'customer_name' => ['required', 'string', 'min:5'],
                'customer_phone_number' => ['required', 'string', 'min:10'],
                'status' => ['required'],
            ]
        );
        
        $total = ServicePackage::where('id', $data['id_package'])->get()->first();
        $data['total'] = $total->price;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $transaction->update($data);
        }

        return redirect ('/dashboard/admin/transaction')->with(['success' => 'Transaksi Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id', $id)->delete();
        return redirect ('/dashboard/admin/transaction')->with(['success' => 'Transaction Berhasil Dihapus']);
    }
}
