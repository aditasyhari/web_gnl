<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\Photo;
use App\Category;
use App\SingleCategory;
use App\SubCategory;

use File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        $categories = Category::all();
        $singlecategories = SingleCategory::all();
        $subcategories = SubCategory::all();


        $product1 = Product::
                        join('sub_categories', 'products.sub_category_id','=','sub_categories.id')
                        ->join('categories', 'sub_categories.category_id','=','categories.id')
                        ->select('products.*',
                                'sub_categories.name AS subcategory',
                                'categories.name AS category',
                                )
                        ->with('images')
                        ->get();

        $product2 = Product::
                        join('single_categories', 'products.single_category_id','=','single_categories.id')
                        ->select('products.*',
                                'single_categories.name AS singlecategory',
                                )
                        ->with('images')
                        ->get();

        return view('admin.product.product', compact('categories', 'singlecategories', 'subcategories', 'product1', 'product2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        $singlecategories = SingleCategory::all();

        return view('admin.product.add_product', compact('categories', 'singlecategories'));
        // return view('admin.product.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $files = $request->file('images');

        $file_count = count($files);

        $dataId;

        if($request->has('sub_category')){
            $dataId = Product::create([
                'name' => $request->name,
                'sub_category_id'=> $request->category,
                'desc' => $request->desc,
                'price' => $request->price,
            ])->id;
        } else{
            $dataId = Product::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'single_category_id'=>$request->category,
            ])->id;
        }
        if($request->hasfile('images'))
        {
            foreach($files as $image)
            {
                $name = time()."_".$image->getClientOriginalName();
                $image->move(public_path().'/img/product/', $name);
                $photo = new Photo();
                $photo->name = $name;
                $photo->product_id = $dataId;
                $photo->save();
            }
        }


        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $singlecategories = SingleCategory::all();
        $multicategori = SubCategory::find($product->sub_category_id);
        if($multicategori == null){
            $multicategori = json_decode(json_encode(['category_id'=>'0']));
        }
        return view('admin.product.edit_product', compact('categories', 'singlecategories','product','multicategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = [];
        $files = $request->file('images');

        // $file_count = count($files);

        if($request->has('sub_category')){
            $dataId = Product::where('id', $product->id)
            ->update([
                'name' => $request->name,
                'sub_category_id'=> $request->category,
                'desc' => $request->desc,
                'price' => $request->price,
                'single_category_id'=>NULL,
            ]);
        } else{
            $dataId = Product::where('id', $product->id)
            ->update([
                'name' => $request->name,
                'sub_category_id'=> NULL,
                'desc' => $request->desc,
                'price' => $request->price,
                'single_category_id'=>$request->category,
            ]);
        }

        if($request->hasfile('images'))
        {
            foreach($files as $image)
            {
                $name = time()."_".$image->getClientOriginalName();
                $image->move(public_path().'/img/product/', $name);
                $photo = new Photo();
                $photo->name = $name;
                $photo->product_id = $product->id;
                $photo->save();
            }
        }

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $data = Product::where('id','=',$product->id)->with('images');

        foreach($data->get()[0]->images as $image){
            $files = $image->name;
            $tujuan_hapus = 'img/product/'.$files;
            File::delete($tujuan_hapus);
        }
        
        // Product::destroy($product->id);
        $data->delete();
        return redirect('/admin/product')->with('status', 'Data berhasil dihapus !');
    }

    public function imageDelete($image)
    {
        $imageName = Photo::find($image)->name;
        $tujuan_hapus = 'img/product/'.$imageName;
        File::delete($tujuan_hapus);
        Photo::destroy($image);
        return redirect()->back();
    }
}
