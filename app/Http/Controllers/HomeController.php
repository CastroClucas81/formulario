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
    public function deletarLista($id)
    {
       $nova = \App\ListaTransferencia::find($id);

       $nova->delete();
       return redirect()->back();
   }
   public function index(Request $request)
   {
       $usuarios = \App\Formulario::where('FKidusuario', \Auth::user()->id);


       if(isset($request['transferir'])){
        if(isset($request['usuarios']))
        foreach ($request['usuarios'] as $key => $value) {
            if(\App\ListaTransferencia::where('FKidformulario',$value)->count() ==0){
                $nova = new \App\ListaTransferencia;
                $nova['FKidformulario'] = $value;
                $nova->save();
            }
        }
    }

    $usuarios = $usuarios->paginate(10);
    $usuariostransferir = \App\ListaTransferencia::paginate(10);

    return view('home', compact('usuarios', 'usuariostransferir'));
}

public function form()
{
    return view('form');
}

public function CadastrarForm(Request $request)
{

        #salvar request no bd
    if (isset($request['id']) && $request['id'] != '') {
     $objeto = \App\Formulario::find($request['id']);
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
    $objeto = new \App\Formulario;
}

$objeto['FKidusuario'] = \Auth::user()->id;
$objeto['nome'] = $request->nome;
$objeto['cidade'] = $request->cidade;
$objeto['sexo'] = $request->sexo;


if ($objeto->save()) {
    return redirect()->back();
}else{
    dd('error');
}

}
}
