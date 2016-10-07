
@extends('layout/principal')

@section('conteudo')

	<h1>Detalhes do produto: {{$p->nome}} </h1>

	<ul>
		<li>
			<b>Valor:</b> R$ {{$p->valor}}
		</li>
		<li>
			<b>Descrição:</b> {{$p->descricao OR 'nenhuma descricao informada'}} 
		</li>
		<li>
			<b>Quantidade e estoque:</b> R$ {{$p->quantidade}}
		</li>				
	</ul>

@stop