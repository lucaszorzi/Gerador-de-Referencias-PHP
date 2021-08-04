<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('register');

        $products = \App\Register::all();

        return view('register.index',compact('products'));
    }

    public function tipo_obra(Request $request)
    {
        $tipo_obra = $request->session()->get('tipo_obra');

        return view('pages.tipo_obra',compact('tipo_obra'));
    }

    public function Posttipo_obra(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_obra' => 'required',
        ]);
        
        $request->session()->put('tipo_obra', $request->tipo_obra);

        return redirect('/autores');
    }

/*
    public function qnt_autores(Request $request)
    {
        $qnt_autores = $request->session()->get('qnt_autores');

        return view('pages.qnt_autores',compact('qnt_autores'));
    }

    public function Postqnt_autores(Request $request)
    {
        $validatedData = $request->validate([
            'qnt_autores' => 'required',
        ]);
        
        $request->session()->put('qnt_autores', $request->qnt_autores);

        return view("pages.autores", ["qnt_autores"=>$request->qnt_autores]);
        //return view('pages.autores',compact('qnt_autores'));
    }
*/
    


    public function autores(Request $request)
    {
        $autores = $request->session()->get('autores');

        if($request->session()->get('qnt_autores') == null)
            $qnt_autores = 0;
        else
            $qnt_autores = $request->session()->get('qnt_autores');

        return view('pages.autores', compact('autores', 'qnt_autores'));
    }

    public function Postautores(Request $request)
    {

        $validatedData = $request->validate([
            'qnt_autores' => 'required|numeric|not_in:0',
        ]);

        $request->session()->put('qnt_autores', $request->qnt_autores);

        if($request->session()->get('autores') == null)
            $request->session()->put('autores', []); //se não existir um array, cria (obrigatório para inserir coisas nele no modo array)
        else
            $request->session()->pull('autores'); //se já existir, limpa.

        for($i=0; $i < $request->qnt_autores; $i++){
            $request->session()->push('autores', $request->autor[$i]); //insere os autores (autor[$i]) no array "autores" da sessão
        }

        return redirect('/dados_obra');
    }


    public function dados_obra(Request $request)
    {
        //$dados_obra = $request->session()->get('dados_obra');

        return view('pages.dados_obra');
    }

    public function Postdados_obra(Request $request)
    {
        $validatedData = $request->validate([
            'titulo'            =>  'required',
            //'edicao'            =>  'numeric|integer|gte:0',
            'local_publicacao'  =>  'required',
            'editora'           =>  'required',
            //'numero_paginas'    =>  'numeric|integer|gte:0',
        ]);

        $request->session()->put('titulo', $request->titulo);
        $request->session()->put('subtitulo', $request->subtitulo);
        $request->session()->put('edicao', $request->edicao);
        $request->session()->put('local_publicacao', $request->local_publicacao);
        $request->session()->put('editora', $request->editora);
        $request->session()->put('ano_publicacao', $request->ano_publicacao);
        $request->session()->put('numero_paginas', $request->numero_paginas);

        return redirect('/meio_publicacao');
    }


    public function meio_publicacao(Request $request)
    {
        //$dados_obra = $request->session()->get('dados_obra');

        return view('pages.meio_publicacao');
    }

    public function Postmeio_publicacao(Request $request)
    {   
        $request->session()->put('disponivel_em', $request->disponivel_em);
        $request->session()->put('acesso_em', $request->acesso_em);
        return redirect('/referencia');
    }


    public function referencia(Request $request)
    {
        $referencia = CategoryController::Gerador_de_referencia($request);

        return view('pages.referencia', compact('referencia'));
    }


    public static function Gerador_de_referencia($request)
    {
        /*if($request->session()->get('qnt_autores') == 0)
            $autores = null;
        else
            $autores = $request->session()->get('autores');
*/
            $autores = 'NOME, Autor';
        $titulo             = $request->session()->get('titulo');
        $subtitulo          = $request->session()->get('subtitulo');
        $edicao             = $request->session()->get('edicao');
        $local_publicacao   = $request->session()->get('local_publicacao');
        $editora            = $request->session()->get('editora');
        $ano_publicacao     = $request->session()->get('ano_publicacao');
        $numero_paginas     = $request->session()->get('numero_paginas');
        $meio_publicacao    = $request->session()->get('meio_publicacao');
        if($meio_publicacao == "online"){
            $disponivel_em  = $request->session()->get('disponivel_em');
            $acesso_em      = $request->session()->get('acesso_em');
        }
        else if ($meio_publicacao == "midias"){
            $descricao_fisica  = $request->session()->get('descricao_fisica');
            $versao            = $request->session()->get('versao');   
        }

        $referencia = $autores . '. ' . $titulo;
        if($subtitulo!=null)
            $referencia = $referencia . ': ' . $subtitulo . '. ';
        else
            $referencia = $referencia . '. ';

        $referencia = $referencia . $edicao . '. ed.' . $local_publicacao . ': ' . $editora . ', ' . $ano_publicacao . '. ';

        if($numero_paginas!=null)
            $referencia = $referencia . $numero_paginas . ' p. ';

        return($referencia);
    }























    
    public function createStep3(Request $request)
    {  
        $register = $request->session()->get('register');
        return view('pages.step3',compact('register'));
    }

    public function PostcreateStep3(Request $request)
    {
        $register = $request->session()->get('register');

        if(!isset($register->productImg)) {
            $request->validate([
                'productimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();
            $request->productimg->storeAs('productimg', $fileName);
            $register = $request->session()->get('register');
            $register->productImg = $fileName;
            $request->session()->put('register', $register);
        }
        return view('pages.step4',compact('register'));
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        $register->productImg = null;

        return view('pages.step3',compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        $register->save();

        return redirect('/data');
    }
}
