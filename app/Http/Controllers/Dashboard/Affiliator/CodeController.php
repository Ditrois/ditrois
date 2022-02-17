<?php

namespace App\Http\Controllers\Dashboard\Affiliator;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $aff = Affiliator::where('id_user', $userId)->get()->first();
        return view('dashboard.affiliator.code', compact('aff'));
    }

    public function update(Request $request, $id)
    {
        $aff = Affiliator::find($id);
        $request->validate([
            'code'      => 'required|unique:affiliators',
        ]);
        $data = $request->all();
        
        $aff->update($data);

        return redirect ('/dashboard/affiliator/code');
    }
}
