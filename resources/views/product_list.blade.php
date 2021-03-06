@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-md-7"><b>Lista de Produtos</b></div>
						<div class="col-md-3"><a href="{{ route('new_product') }}">Novo Produto</a></div>
						<div class="col-md-2"><a href="{{ route('list_payment') }}">Lista de Pagamentos</a></div>
					</div>
				</div>

                <div class="card-body">
					<table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">nome</th>
                            <th scope="col">preço</th>
                            <th scope="col">promoção</th>
                            <th scope="col">ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $product)

                            <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price_anchor }}</td>
                            <td>{{ $product->price_promotional }}</td>
                            <td>
                                <div class="col-md-6">
						            <a href="{{ route('delete_product',$product->id)  }}">delete</a>
						        </div>
                                <div class="col-md-6">
                                    <a href="{{ route('show_product',$product->id)  }}">edit</a>
                                </div>
                            </td>
                            </tr>

					        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
