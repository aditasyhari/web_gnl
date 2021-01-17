<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Banner;
use File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Banner = Banner::all();
        return view('admin.banner.index',compact('Banner'));
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

        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'name' => 'required',
		]);
 
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'img/banner';
		$file->move($tujuan_upload,$nama_file);
 
		Banner::create([
			'headline' => $request->name,
			'photo' => $nama_file,
        ]);
        
        return redirect ('admin/settings/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $delBanner = Banner::find($banner);
        $files = $delBanner[0]->photo;
        $tujuan_hapus = 'img/banner/'.$files;
        File::delete($tujuan_hapus);

        Banner::destroy($banner->id);

        return redirect('admin/settings/banner');
    }
}
