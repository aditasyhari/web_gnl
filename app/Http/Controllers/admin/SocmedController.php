<?php

namespace App\Http\Controllers\admin;

use App\Socmed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $socmed = Socmed::all();
        return view('admin.socmed.index', compact('socmed'));
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
        $wa = $request->wa;
        $ig = $request->ig;
        $fb = $request->fb;

        Socmed::where('id', 1)->update(['name' => $wa ]);
        Socmed::where('id', 2)->update(['name' => $ig ]);
        Socmed::where('id', 3)->update(['name' => $fb ]);

        return redirect('admin/settings/socmed')->with('status', 'Data Berhasil Disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socmed  $socmed
     * @return \Illuminate\Http\Response
     */
    public function show(Socmed $socmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socmed  $socmed
     * @return \Illuminate\Http\Response
     */
    public function edit(Socmed $socmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socmed  $socmed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socmed $socmed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socmed  $socmed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socmed $socmed)
    {
        //
    }
}
