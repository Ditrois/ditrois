<?php

namespace App\Http\Controllers;

use App\Models\Affiliator;
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
        return view('dashboard.admin.affiliators');
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
    public function edit(Affiliator $affiliator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affiliator  $affiliator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affiliator $affiliator)
    {
        //
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
