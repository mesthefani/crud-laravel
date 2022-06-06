<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['users']=User::orderBy('id','desc')->get();
        return view('user.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
        //$datosuser=request()->all();
        $datosUser=request()->except('_token');
        // $user = new User();
        // $user->password= Hash::make($request->password);

        if($request->hasFile('avatar')){
            $datosUser['avatar']=$request->file('avatar')->store('uploads','public');
        }
        $datosUser['password'] = Hash::make($request->password);
        User::insert($datosUser);
        //return response()->json($datosUser);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit', compact('user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosUser= request()->except(['_token','_method']);

        if($request->hasFile('avatar')){

            $user=User::findOrFail($id);
            Storage::delete('public/'.$user->avatar);
            $datosUser['avatar']=$request->file('avatar')->store('uploads','public');
        }

        User::where('id','=',$id)->update($datosUser);
        $user=User::findOrFail($id);
        return view('user.edit', compact('user') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);
        if(Storage::delete('public/'.$user->avatar)){
        User::destroy($id);
        }
        return redirect('user');
    }
}
