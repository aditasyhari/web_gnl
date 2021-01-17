<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Session;
use Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = User::where('id', 1)->get();
        // $akun = User::all()->first();
        return view('admin.akun.index', compact('akun'));
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
        $rules = [
            'username'                  => 'required|min:3|max:35',
            'password_lama'             => 'required',
            'password_baru'             => 'required'
        ];
         
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.min'          => 'Username minimal 3 karakter',
            'username.max'          => 'Username maksimal 35 karakter',
            'password_lama.required'     => 'Password wajib diisi',
            'password_baru.required'    => 'Password wajib diisi'
        ];
         
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
    
        $user = User::find(1);

        // $password_lama = Hash::make($request->password_lama);

        if(Hash::check($request->password_lama, $user->password)) {
            User::where('id', 1)->update([
                'username' => ucwords(strtolower($request->username)),
                'password' => Hash::make($request->password_baru),
            ]);

            return redirect()->route('logout');

        } else {
            
            return redirect()->back()->with('errors', 'Akun gagal di update! Silahkan ulangi lagi');
        }

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
}
