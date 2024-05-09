<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //consultar todos los Usuarios
    public function index(){
        return User::paginate();
    }
    //consultar un Usuario
    public function show($id){
        return User::find($id);
    }

    //crear un Usuario
    public function store(Request $request){
        $this->validate($request,[
            'username'=> 'required',
            'email'=>'required|unique:users',
            'password'=> 'required',
        ]); 
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    //actualizar un Usuario
    public function update(Request $request,$id){
        $this->validate($request,[
            'email'=> 'filled|unique:users',
        ]); 
        $user = User::find($id);
        if (!$user) return response('', 404);
        $user->update($request->all());
        if($request->password) $user->password = Hash::make($request->password); 
        $user->save();
        return $user;
    }

    //eliminar un Usuario
    public function destroy($id){
        $user = User::find($id);
        if (!$user) return response('', 404);
        $user->delete();
        return $user;
    }
}
