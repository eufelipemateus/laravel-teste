@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-md-7"></div>
					</div>
				</div>

                <div class="card-body">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>


                    <h2>Cartão de Credito</h2>
                    <p>{{ $product->max_portion }}x  de  R$ {{  number_format($product->portion_value,2) }}  </p>

                    <h2>Pix</h2>
                    <p>R$ {{ number_format($product->pix_value,2) }}</p>


                    <h2>Boleto</h2>
                    <p>R$ {{ number_format($product->billet_value,2) }}</p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
