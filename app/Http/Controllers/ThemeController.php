<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('dashboard.admin.themes', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $services = Service::all();
        return view('dashboard.admin.theme_new', compact('services'));
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

        $validator = Validator::make(
            $data,
            [
                'id_service' => ['required'],
                'name' => ['required', 'min:5'],
                'demo_link' => ['required', 'min:5'],
                'image' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $file = $request->file('image');
            $path = 'admin/theme';
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($path,$nama_file);
            $data['image'] = $nama_file;

            Theme::create($data);
            return redirect ('/dashboard/admin/theme')->with(['success' => 'Transaksi Baru Berhasil Dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);
        $services = Service::all();

        return view('dashboard.admin.theme_edit', compact('theme', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $theme = Theme::find($id);
        $data = $request->all();

        if ($request->image == null) {
            $data = $request->except(['image']);
        } else {
            $data = $request->all();
        }

        $validator = Validator::make(
            $data,
            [
                'id_service' => ['required'],
                'name' => ['required', 'min:5'],
                'demo_link' => ['required', 'min:5'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if(is_null($request->image)){
            }else{
                $file = $request->file('image');
                $path = 'admin/theme';
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move($path,$nama_file);
                $data['image'] = $nama_file;
            }
            $theme->update($data);
        }

        return redirect ('/dashboard/admin/theme')->with(['success' => 'Theme Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theme::where('id', $id)->delete();
        return redirect ('/dashboard/admin/theme')->with(['success' => 'Theme Berhasil Dihapus']);
    }
}
