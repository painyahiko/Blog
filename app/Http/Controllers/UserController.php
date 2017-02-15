<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Rol;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('user');
    }

    public function index(Request $request)
    {

        $users = User::name($request->get('name'))->orderBy('rol_id','desc')->paginate(10);
        foreach ($users as $user) {
        	
        	$user->rol = Rol::findOrFail($user->rol_id);
        }
        return view('backend.users.index')->withUsers($users);
    }


	 public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit')->withUser($user);
    }



    public function update(UpdateUserRequest $request, $id)
    {
    	
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rol_id = $request->input('rol_id');
        $user->save();

        if($user->save()){
            
            return redirect()->route('backend.users.index')->with('status', "Usuario $user->name actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar los datos del Usuario');
        }

    }


    public function destroy($id)
    {
    	$user = User::findOrFail($id);
        User::destroy($id);

        return redirect()->route('backend.users.index')->with('status', "Usuario $user->name Borrado");
    }

}
