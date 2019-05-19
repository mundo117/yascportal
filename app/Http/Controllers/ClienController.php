<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yascportal\Http\Requests;
use yascportal\Client;
use Illuminate\Support\Facades\Redirect;
use yascportal\Http\Requests\ClientFormRequest;
use DB;


class ClienController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		//para el filtro de busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion', '=', '1')
    		->orderBy('idcategoria', 'asc')
    		->paginate(7);
    		return view('almacen.categoria.index', ["categorias"=> $categorias, "searchText"=>$query]);

    	}
    }

    public function create(){
    	return view("almacen.categoria.create");
    }

    public function store(CategoriaFormRequest $request){
    	$categoria= new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->condicion='1';
    	$categoria->save(); //metodo save para almecenar un objeto en la base de datos
    	return Redirect::to('almacen/categoria');


    }

    public function show($id){
    	return view("almacen.categoria.show", ["categoria"=>Categoria::findOrFail($id)]);
    }
 
    public function edit($id){
    	return view("almacen.categoria.edit", ["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id){
    	$categoria=Categoria::findOrFail($id);
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    }

    public function destroy($id){
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    }
}
