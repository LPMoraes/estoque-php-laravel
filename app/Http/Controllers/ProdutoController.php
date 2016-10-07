<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests\ProdutosRequest;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use Validator;

class ProdutoController extends Controller{

	public function __construct()
	{
		$this->middleware('auth',['only' => ['novo', 'remove']]);
	}


	public function lista()
	{	
		$produtos  = Produto::all();
		//return view('listagem')->with('produtos', produtos);
		return view('produtos/listagem', ['produtos' => $produtos]);		
	}

	public function listaJson()
	{
		//$produtos  = DB::select("SELECT * FROM produtos");
		$produtos  = Produto::all();
		return response()->json($produtos);
	}

	public function mostra($id)
	{	
		$resposta = Produto::find($id);

		if (empty($resposta)) return "<h1>Esse produto não existe!</h1>";
		
		return view('produtos/detalhes', ['p' => $resposta]);
	}

	public function novo()
	{		
		return view('produtos.formulario');
	}

	public function adiciona(ProdutosRequest $request)
	{				
		Produto::create($request->all());
		
		return redirect()->route("listagem")->withInput(Request::only('nome'));
	}
	
	public function remove($id)
	{		
		$produto =  Produto::find($id);			
		$produto->delete();

		return redirect()->route("listagem");
	}	

	public function altera($id)
	{		
		$produto = Produto::find($id);
		return view('produtos.altera', ['produto'=>$produto]);
	}	

	public function modifica($id)
	{			
		$produto = Produto::find($id);
		$produto->nome = Request::input('nome');		
		$produto->valor = Request::input('valor');
		$produto->descricao = Request::input('descricao');
		$produto->quantidade = Request::input('quantidade');
		$produto->save();

		return redirect()->route("listagem");
	}	
}


//return redirect('/produtos')->withInput(Request::only('nome'));

		//return view('produtos.adicionado', ['nome' => $dadosForm['nome']]);

		//withInput() passa os dados desta requisão para a proxima requisição quando acontecer redirect

		//withInput(Request::only('nome')) ---> passa apenas o nome

		//withInput(Request::except('nome')) ---> passa todos outros dados do form menos o input nome

