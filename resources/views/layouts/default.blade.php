<!DOCTYPE html>
<html lang="en">
 <head>
    @include('includes.head')
 </head>
 <body class="bg-light">
    @include('includes.nav')
    @include('includes.header')

    <div class="container">
	  <div class="py-5 text-center">
	    <img class="d-block mx-auto mb-4" src="https://image.flaticon.com/icons/svg/2844/2844357.svg" alt="" width="72" height="72">
	    <h2>Gerador de referências</h2>
	    <p class="lead">Insira os dados da obra abaixo para gerar a sua refência.</p>
	  </div>

	  <div class="row">
		    <div class="col-md-4 order-md-2 mb-4">
		      <h4 class="d-flex justify-content-between align-items-center mb-3">
		        <span class="text-muted">Referências geradas</span>
		        <span class="badge badge-secondary badge-pill">1</span>
		      </h4>
		      <ul class="list-group mb-3">
		        <li class="list-group-item d-flex justify-content-between lh-condensed">
		          <div>
		            <small class="text-muted">Referencia 1</small>
		          </div>
		          <span class="text-muted">COPY</span>
		        </li>
		      </ul>

		      <form class="card p-2">
		        <div class="input-group">
		          <input type="text" class="form-control" placeholder="Promo code">
		          <div class="input-group-append">
		            <button type="submit" class="btn btn-secondary">Redeem</button>
		          </div>
		        </div>
		      </form>
		    </div>
	    	
	    	@yield('content')

  		</div>

    	@include('includes.footer')
    </div>
    @include('includes.footer-scripts')
 </body>
</html>