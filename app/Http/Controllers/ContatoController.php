<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use Redirect;

class ContatoController extends Controller
{
    public function home(){
    	$contato = Contato::all();
        return view('visualizar',['contato'=>$contato]);
    }
    public function create(){
        $contato = Contato::all();
        return view('formulario',['contato'=>$contato]);
    }
    public function save(Request $request){

    	if($request->hasfile('foto')){
    		$foto = $request->file('foto');
    		$extensao = $foto->getClientOriginalExtension();
    		if($extensao != 'png' && $extensao !='jpg'){
    			return Redirect::back()->with('status','Formato inválido!');
    		}
    	}
    	$contato = new Contato();
    	$foto ='';
    	$contato->fill($request->all());
    	$contato->save();
    	 if($request->hasfile('foto')){
            $foto = $contato->id . '_foto.' . $request->file('foto.').$extensao;
             
            $request->file('foto')->move(base_path(). '/public/images', $foto);
        
        }
         $contato->foto=$foto;
         $contato->save();

            
        \Session::flash('status','Cadastrado realizado com sucesso');
        return Redirect::to('home');
    }
    public function visualizar(){
        $contato = Contato::all();
        return view('visualizar',['contato'=>$contato]);
    }
    public function detalhes($id){
        $contato = Contato::findOrFail($id);
        return view('detalhes',['contato'=>$contato]);
    }
     public function editar($id){
        $contato = Contato::findOrfail($id);
        return view ('formulario',['contato'=>$contato]);
    }

    public function update(Request $request, $id){

        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $extensao = $foto->getClientOriginalExtension();
            if($extensao != 'png' && $extensao != 'jpg'){
              return Redirect::back()->with('status', 'Formato inválido');
            }
        }
        
        $contato = Contato::findOrFail($id);
    
        $contato->update($request->all());
        $contato->save();
        if($request->hasfile('foto')){
            $foto = $contato->id . '_foto.' . $request->file('foto.').
            $extensao;
            $request->file('foto')->move(base_path(). '/public/images', $foto);
        $contato->foto=$foto;
        }
         
        $contato->update();
                
        \Session::flash('status','Usuário Atualizado com sucesso');
        return Redirect::to('cadastro/'.$contato->id.'/editar');
    }

    public function delete($id){
         $contato = Contato::findOrFail($id);
         $contato->delete();
        \Session::flash('status','Usuário deletado');
        return Redirect::to('visualizar');

    }



}
