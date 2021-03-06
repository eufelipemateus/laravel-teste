@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-md-7"><b>Configurações Pagamentos</b></div>

						<div class="col-md-3"><a href="{{ route('new_payment') }}">Add Pagamento</a></div>
						<div class="col-md-2"><a href="{{ route('list_product') }}">Lista de Produtos</a></div>
					</div>
				</div>

                <div class="card-body">
					<table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">nome</th>
                            <th scope="col">parecelas</th>
                            <th scope="col">ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $payment)
                                <tr>
                                    <th scope="row">{{ $payment->id }}</th>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->max_portion }}</td>
                                    <td>
                                        <div class="col-md-6">
                                            <a href="{{ route('delete_payment',$payment->id)  }}">delete</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('show_payment',$payment->id)  }}">edit</a>
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
