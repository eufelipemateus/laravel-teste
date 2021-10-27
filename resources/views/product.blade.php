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
						<div class="col-md-7"><b>Product</b></div>
						{{-- <div class="col-md-3"><a href="{{ route('') }}"></a></div>
						<div class="col-md-2"><a href="{{ route('') }}"></a></div>  --}}
					</div>
                </div>

                <div class="card-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">

						{{ csrf_field() }}



						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input id="name" type="text"   class="form-control" name="name" value="@if(isset($product->name)){{ $product->name }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <div class="form-group">
							<label for="types" class="col-md-4 control-label">Tipos</label>
							<div class="col-md-6">
								<select id="types"  class="form-control" name="types" require >
                                    <option></option>
                                    <option>CURSOS</option>
                                    <option>REVISAO_TRABALHO</option>
                                    <option>SEGUNDA_CHAMADA</option>
                            </select>
                                @if ($errors->has('types'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('types') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

                        <div class="form-group">
							<label for="description" class="col-md-4 control-label">Descrição</label>
							<div class="col-md-6">
								<textarea id="description"  class="form-control" name="description" placeholder="" required autofocus> @if(isset($product->description)){{ $product->description }}@endif </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

                        <div class="form-group">
							<label for="price_anchor" class="col-md-4 control-label">Preço Ancora</label>
							<div class="col-md-6">
								<input id="price_anchor" type="number"   class="form-control" name="price_anchor" value="@if(isset($product->price_anchor)){{ $product->price_anchor }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('price_anchor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_anchor') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <div class="form-group">
							<label for="price_promotional" class="col-md-4 control-label">Preço Promocional </label>
							<div class="col-md-6">
								<input id="price_promotional" type="number"   class="form-control" name="price_promotional"value="@if(isset($product->price_promotional)){{ $productPayment->price_promotional }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('price_promotional'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_promotional') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <div class="form-group">
							<label for="product_payment_id" class="col-md-4 control-label">Tipo Payment</label>
							<div class="col-md-6">
								<select id="product_payment_id"  class="form-control" name="product_payment_id" require >
                                    <option vlaue="null"></option>
                                    @foreach($productPayments as $payment)
                                    <option   @if(isset($product->product_payment_id)) @if($product->product_payment_id==$payment->id)  selected  @endif  @endif   value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_payment_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_payment_id') }}</strong>
                                    </span>
                                @endif
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
