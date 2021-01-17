<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\About;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function product()
    {
        return view('user.product.index');
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('user.faq', compact('faqs'));
    }

    public function about()
    {
        $tentang = About::where('id', 1)->get();
        return view('user.about', compact('tentang'));
    }
}
