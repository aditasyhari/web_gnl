<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Faq;
use App\About;
use App\Category;
use App\SubCategory;
use App\SingleCategory;
use App\Banner;
use App\Socmed;
use App\Product;

class UserController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::all();

        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);

        $products = Product::orderBy('updated_at', 'desc')->paginate(6);

        return view('user.index', compact('banners', 'wa', 'ig', 'fb', 'products'));
    }

    public function product()
    {

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $singlecategories = SingleCategory::all();

        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);

        $products = Product::orderBy('updated_at', 'desc')->paginate(9);

        return view('user.product.index', compact(
            'categories', 
            'subcategories', 
            'singlecategories', 
            'wa', 
            'fb', 
            'ig',
            'products'
        ));
    }

    public function productCategory($name)
    {

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $singlecategories = SingleCategory::all();

        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);
        
        // $category = Category::where('name', $name)->count();
        $subcategory = SubCategory::where('name', $name)->first();
        $singlecategory = SingleCategory::where('name', $name)->first();

        if(isset($singlecategory)){
            $products = SingleCategory::where('name', $name)->paginate(9);
            return view('user.product.index_category', compact(
                'categories', 
                'subcategories', 
                'singlecategories', 
                'wa', 
                'fb', 
                'ig',
                'products'
            ));
        }

        $products = SubCategory::where('name', $name)->paginate(9);
        return view('user.product.index_category', compact(
            'categories', 
            'subcategories', 
            'singlecategories', 
            'wa', 
            'fb', 
            'ig',
            'products'
        ));

        // $products = Product::where()->paginate(9);
        // dd($products->productphoto);

    }

    public function faq()
    {
        $faqs = Faq::all();

        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);

        return view('user.faq', compact('faqs', 'wa', 'fb', 'ig'));
    }

    public function about()
    {
        $tentang = About::where('id', 1)->get();

        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);

        return view('user.about', compact('tentang', 'wa', 'fb', 'ig'));
    }

    public function detail(Request $request, $name)
    {
        $wa = Socmed::find(1);
        $ig = Socmed::find(2);
        $fb = Socmed::find(3);

        $product = Product::where('name', $name)->get();

        return view('user.product.detail', compact('wa', 'fb', 'ig', 'product'));
    }
}
