<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Faq;
use App\About;
use App\Category;
use App\SubCategory;
use App\Banner;
use App\Socmed;

class UserController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::all();
        $wa = Socmed::where('id', 1)->get();
        $ig = Socmed::where('id', 2)->get();
        $fb = Socmed::where('id', 3)->get();
        return view('user.index', compact('banners', 'wa', 'ig', 'fb'));
    }

    public function product()
    {

        $categories = Category::all();
        $subcategories = SubCategory::all();

        $wa = Socmed::where('id', 1)->get();
        $ig = Socmed::where('id', 2)->get();
        $fb = Socmed::where('id', 3)->get();

        return view('user.product.index', compact('categories', 'subcategories', 'wa', 'fb', 'ig'));
    }

    public function faq()
    {
        $faqs = Faq::all();

        $wa = Socmed::where('id', 1)->get();
        $ig = Socmed::where('id', 2)->get();
        $fb = Socmed::where('id', 3)->get();

        return view('user.faq', compact('faqs', 'wa', 'fb', 'ig'));
    }

    public function about()
    {
        $tentang = About::where('id', 1)->get();

        $wa = Socmed::where('id', 1)->get();
        $ig = Socmed::where('id', 2)->get();
        $fb = Socmed::where('id', 3)->get();

        return view('user.about', compact('tentang', 'wa', 'fb', 'ig'));
    }
}
