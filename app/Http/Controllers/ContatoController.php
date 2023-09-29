<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        // $contato = new SiteContato;
        // $contato->nome = $request->input('nome');
        // $contato->email = $request->input('email');
        // $contato->telefone = $request->input('telefone');
        // $contato->motivo_contato = $request->input('motivo_contato'); // o foda é que coloquei o campo como motivo-contato,
        // $contato->mensagem = $request->input('mensagem');//  nao como motivo_contato

        // // print_r($contato->getAttributes());
        // $contato->save();
        
        // $contato = new SiteContato();
        // $contato->create($request->all());
        // $contato->save();
        // print_r($contato->getAttributes());

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        // echo $request->input('motivo_contato');

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato teste', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        $feedback = [
            'nome.min' => 'A quantidade mínima de caracteres é 3.',
            'nome.max' => 'A quantidade máxima de caracteres é 40.',
            'nome.unique' => 'Nome já cadastrado.',
            
            'required' => 'O campo :attribute deve ser preenchido.',
            'email.email' => 'O email é obrigatório.',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 2000 caracteres.'
        
        ];

        $regras = [
            'nome'=> 'required|min:3|max:40|unique:site_contatos', //nomes com no min 3 carc e max 40
            'telefone'=> 'required', // | serve para separar as regras
            'email'=> 'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000'
        ];
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
