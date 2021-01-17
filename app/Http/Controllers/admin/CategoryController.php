<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Category;
use App\SingleCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
			'name' => 'required',
        ]);
        
        $jenisKategori = $request->jenis_kategori;
        $namaKategori = $request->name;

        if($jenisKategori == 1){
            Category::create([
                'name' => $request->name
            ]);
        } else {
            SingleCategory::create([
                'name' => $request->name
            ]);
        }

        return redirect('admin/product')->with('status', 'Category Berhasil dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SingleCategory $singlecategory)
    {
        //
        SingleCategory::destroy($singlecategory->id);
        return redirect('/admin/product')->with('status', 'Data berhasil dihapus !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/admin/product')->with('status', 'Data berhasil dihapus !');
    }

    public function destroy2(SingleCategory $singlecategory)
    {
        SingleCategory::destroy($singlecategory->id);
        return redirect('/admin/product')->with('status', 'Data berhasil dihapus !');
    }
}
