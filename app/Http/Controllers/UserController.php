<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {   
        $user = User::orderBy('name','asc')->get();
        return view('users.index',['user' => $user]);
    }

    public function create()
    {
        $user = User::orderBy('name','asc')->get();
        return view('users.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'role' => $request->role,
            'instansi' => $request->instansi,
            'password' => Hash::make($request->password)
        ]);
        //$user->save();
        
        Alert::success('User', 'Berhasil Ditambah!');
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        // $decrypted = Crypt::decryptString($pass);
        return view('users.edit',['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        User::where('id',$id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'role' => $request->role,
            'instansi' => $request->instansi,
            'password' => Hash::make($request->password)
        ]);
        //$user->save();
        
        Alert::success('User', 'Berhasil Diedit!');
        return redirect()->route('user.index');
    }

    public function updatepass(Request $request, $id)
    {
        User::where('id',$id)->update([
            'password' => Hash::make($request->password)
        ]);
        //$user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
