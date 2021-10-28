@extends('app')

@section('style')
<style>
.row{
    margin: 1% 0;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
						<div class="col-md-7"><b>Configuração de Pagamento</b></div>
						{{-- <div class="col-md-3"><a href="{{ route('') }}"></a></div>
						<div class="col-md-2"><a href="{{ route('') }}"></a></div>  --}}
					</div>
                </div>

                <div class="card-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">

						{{ csrf_field() }}



						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
								<input id="name" type="text"   class="form-control" name="name" value="@if(isset($productPayment->name)){{ $productPayment->name }}@endif" placeholder="" required autofocus>
							</div>
						</div>

                        <div class="form-group">
							<label for="max_portion" class="col-md-4 control-label">Quantidade Parcelas</label>
							<div class="col-md-6">
								<input id="max_portion" type="number"   class="form-control" name="max_portion" max="36" value="@if(isset($productPayment->max_portion)){{ $productPayment->max_portion }}@endif" placeholder="" required autofocus>
							</div>
						</div>

                        <div class="form-group">
							<label for="pix_discount" class="col-md-4 control-label">Disconto Pix</label>
							<div class="col-md-6">
								<input id="pix_discount" type="number"   class="form-control" name="pix_discount" min="0" step="1" max="100" value="@if(isset($productPayment->pix_discount)){{ $productPayment->pix_discount }}@endif" placeholder="" required autofocus>
							</div>
						</div>

                        <div class="form-group">
							<label for="billet_discount" class="col-md-4 control-label">Disconto Boleto</label>
							<div class="col-md-6">
								<input id="billet_discount" type="number"   class="form-control" name="billet_discount" min="0" step="1" max="100" value="@if(isset($productPayment->billet_discount)){{ $productPayment->billet_discount }}@endif" placeholder="" required autofocus>
							</div>
						</div>

                        <div class="form-group">
							<label for="min_portion_value" class="col-md-4 control-label">Valor Min Parcela </label>
							<div class="col-md-6">
								<input id="min_portion_value" type="number"   class="form-control" name="min_portion_value"value="@if(isset($productPayment->min_portion_value)){{ $productPayment->min_portion_value }}@endif" placeholder="" required autofocus>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-md-offset-5">
								<button  class="btn btn-primary">Salvar</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
