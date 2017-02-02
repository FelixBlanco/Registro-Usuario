<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Pais;
use App\Rol;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }

    public function inicio(){

        $Pais=Pais::all();
        $Role=Rol::all();

        $Usuarios=User::get(); 
        $Usuarios->each(function($Usuarios){
            $Usuarios->pai;
        });
       
        return view('welcome')
                    ->with("Usuarios",$Usuarios)
                    ->with("Pais",$Pais)
                    ->with("Role",$Role);
    }

    public function create(){

        // Pais, Rol que vamos a necesitar en el registro
        $Pais=Pais::all();
        $Role=Rol::all();

        return view("crear")
                    ->with("Pais",$Pais)
                    ->with("Role",$Role);
    }

    public function store(Request $request){

        $AllUser=new User($request->all());
        $AllUser->password=bcrypt($request->password);
        $AllUser->save();
        return redirect()->route("crear");
    
    }

    public function edit($id){
        
        $Pais=Pais::all();
        $Role=Rol::all();
        
        $InfoUser=User::find($id);
        $InfoUser->pai;
        $InfoUser->rol;
       
        return view("edit")
                    ->with("InfoUser",$InfoUser)
                    ->with("Pais",$Pais)
                    ->with("Role",$Role);
    }

    public function update(Request $request, $id){
        dd($id);
        // $InfoUser->fill($request->all());
    }

    public function show($id){

    }
    
    public function destroy(){

    }

}
