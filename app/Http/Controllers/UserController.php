<?php

namespace App\Http\Controllers;

use App\User; //archivo que representa a la tabla usuarios
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::latest()->get(); //1-0consulto los datos
        return view('users.index',['users'=>$users]); //2-cargo la vista y 3-paso los datos
    }
    public function store(Request $request) //este metodo se encarga de trabar con los datos, como estamos haciendo un envio d einformacion laravel coloca por nosotros el nombre de la clase Request (solicitud) de esta forma podremos recibir los datos
    {
        //validacion de datos
        $request->validate([
            'name'=>['required'], 
            'email'=>['required','email','unique:users'], 
            'password' =>['required','min:8'],
        ]);
        // metodo de guardar
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]); //esto crea un usuario
        return back(); //retornamos a la vista anterior 

    }
    public function destroy(User $user) //revibimos un usuario
    {
        $user->delete(); //elminamos al usuario
        return back(); //retornamos a la vista anterior
    }
}
