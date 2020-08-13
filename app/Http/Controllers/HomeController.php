<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function form()
    {
        return view('form');
    }

    public function CadastrarForm(Request $request)
    {
        #salvar request no bd
        if (isset($request['id']) && $request['id'] != '') {
         $objeto = \App\form::find($request['id']);

         if($objeto == null) return redirect()->back();
         if (isset($request['delete'])) {
            if ($objeto->delete()) {
                dd($objeto);
            }else{
                dd('error');
            }
        }
    }
    else{
        $objeto = new \App\form;
    }

    $objeto['nome'] = $request->nome;
    $objeto['cidade'] = $request->cidade;
    $objeto['sexo'] = $request->sexo;


    if ($objeto->save()) {
        dd($objeto);
    }else{
        dd('error');
    }

}
}
