<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\SingleCategory;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jumlah = Product::count();
        return view('admin.dashboard',compact('jumlah'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCategoryName()
    {
        $category = Category::select('name')->get()->toArray();
        $category = array_merge(SingleCategory::select('name')->get()->toArray(), $category);
        $nameCategory =[];
        foreach($category as $categories){
            $nameCategory[] = $categories['name'];
        }
        
        $singles = SingleCategory::withCount('product')->get();
        $countCategory =[];
        foreach($singles as $single){
            $countCategory[] = $single->product_count;
        }

        $data = Category::with('subcategories')->get();
        $countMul =[];
        foreach($data as $ca){
            $jmlSub=0;
            foreach($ca->subcategories as $suca){
                    $jmlSub = $jmlSub + $suca->product_count;
            }
            $countMul[] = $jmlSub;
        }
        $countCategory = array_merge($countCategory, $countMul);

        return response()->json(["name"=>$nameCategory,"count"=>$countCategory]);
    }




}
