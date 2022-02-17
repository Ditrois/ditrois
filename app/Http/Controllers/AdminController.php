<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('dashboard.admin.admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.admin_new');
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
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'phone_number' => ['required', 'string'],
                'address' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['email_verified_at'] = now()->toDateTimeString();
            $data['password'] = Hash::make($request->password);
            // $data['phone_number'] = $request->phone_number;
            // $data['address'] = $request->address;

            $user = User::create($data);
            $user->assignRole('admin');

            Admin::create([
                'id_user' => $user->id,
            ]);

            return redirect ('/dashboard/admin/admin')->with('toast_success','Berhasil membuat akun juri');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);

        return view('dashboard.admin.admin_edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        
        if ($request->password == null) {
            $data = $request->except(['password']);
        } else {
            $data = $request->all();
        }
        
        $admin->update($data);

        return redirect ('/dashboard/admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id_user', $id)->delete();
        User::where('id', $id)->delete();
        return redirect ('/dashboard/admin/admin');
    }
}
