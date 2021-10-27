
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v5.1</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">1</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">{{$product->name }}</h6>
              <small class="text-muted">{{$product->description }}</small>
            </div>
            <span class="text-muted">{{ $product->price_anchor}}</span>
          </li>

          {{-- Descontos --}}
          @if(isset($product->payment) and $paymnet == 'pix')
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">{{ $product->payment->name}}</h6>
              <small>Desconto</small>
            </div>
            <span class="text-success">−{{ $product->price_anchor * (  $product->payment->pix_discount / 100) }} </span>
          </li>
          @endif

          @if(isset($product->payment) and $paymnet == 'billet')
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">{{ $product->payment->name}}</h6>
              <small>Desconto</small>
            </div>
            <span class="text-success">−{{ $product->price_anchor * (  $product->payment->pix_discount / 100) }} </span>
          </li>
          @endif

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">


          <h4 class="mb-3">Payment</h4>

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <a href="{{ route('buy',['id'=>$product->id, 'payment'=> 'credit']) }}" class="btn btn-lg btn-primary  @if($paymnet=='credit') active @endif"> Crédito  </a>
            <a href="{{ route('buy',['id'=>$product->id, 'payment'=> 'pix']) }}" class="btn btn-lg btn-primary @if($paymnet=='pix') active @endif"> Pix </a>
            <a href="{{ route('buy',['id'=>$product->id, 'payment'=> 'billet']) }}" class="btn btn-lg btn-primary @if($paymnet=='billet') active @endif"> Boleto </a>
         </div>

         <hr class="my-4">

        @if($paymnet=="credit")
        <div class="row gy-3">
            <div class="col-md-12">
                <label for="cc-name" class="form-label">Parcelas</label>
                <select  class="form-control" id="cc-name" placeholder="" required>
                    @for ($i = 0; $i < max_portion; $i++)

                    <option>{{ $max_portion }}x</option>
                    @endfor

                </select>
                <small class="text-muted">Parcela de Pagamento</small>

              </div>
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
      @endif
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>

</script>
  </body>
</html>
