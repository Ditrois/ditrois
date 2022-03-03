<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('dashboard.admin.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        return view('dashboard.admin.service_new', compact('categories'));
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
                'id_service_category' => ['required'],
                'name' => ['required', 'unique:services'],
                'banner_heading' => ['required'],
                'banner_desc' => ['required'],
                'feature_desc' => ['required'],
                'image' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['slug'] = Str::slug($data['name'], '-');
            
            $file = $request->file('image');
            $path = 'admin/service';
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($path,$nama_file);
            $data['image'] = $nama_file;

            Service::create($data);
            return redirect ('/dashboard/admin/service')->with(['success' => 'Service Baru Berhasil Dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories = ServiceCategory::all();

        return view('dashboard.admin.service_edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        
        if ($request->image == null) {
            $data = $request->except(['image']);
        } else {
            $data = $request->all();
        }

        $validator = Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'min:5'],
                'id_service_category' => ['required'],
                'banner_heading' => ['required', 'string', 'min:10'],
                'banner_desc' => ['required', 'string', 'min:50'],
                'feature_desc' => ['required', 'string', 'min:50'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if(is_null($request->image)){
            }else{
                $file = $request->file('image');
                $path = 'admin/service';
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move($path,$nama_file);
                $data['image'] = $nama_file;
            }
            $service->update($data);
        }

        return redirect ('/dashboard/admin/service')->with(['success' => 'Service Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->delete();
        return redirect ('/dashboard/admin/service')->with(['success' => 'Service Berhasil Dihapus']);
    
    }
}
