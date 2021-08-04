@extends('layouts.default')
@section('content')

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dados da obra</h4>

      <hr class="mb-4">
      
      <form id="form" class="needs-validation" novalidate action="/" method="POST">
        @csrf

        
        <div class="mb-3">
          <label for="tipo_obra">Tipo de obra<span style="color: red;">*</span></label>

          <input type="text" placeholder="Pesquise.." id="tipo_obra" name="tipo_obra" value="{{ session()->get('tipo_obra') }}" autocomplete="off" onclick="showDropdown()" onkeyup="filterDropdown()" >
          <div id="Dropdown_tiposObras" class="dropdown-content">
              <a id="livro" href="#" value="Monográfia no todo: Livro ou folheto">Monográfia no todo: Livro ou folheto<br><spam>Inclui ahsduashdisu</spam></a>
              <a href="#" value="">Base</a>
              <a href="#">Blog</a>
              <a href="#">Contact</a>
              <a href="#">Custom</a>
              <a href="#">Support</a>
              <a href="#">Tools</a>
          </div>
        </div>

        <style type="text/css">
          
          #tipo_obra {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
          }

          /* The search field when it gets focus/clicked on */
          #tipo_obra:focus {outline: 3px solid #ddd;}

          /* Dropdown Content (Hidden by Default) */
          .dropdown-content {
            border: 1px solid #ddd; /* Add a border to all links */
            margin-top: -1px; /* Prevent double borders */
            background-color: #f6f6f6; /* Grey background color */
            padding: 12px; /* Add some padding */
            text-decoration: none; /* Remove default text underline */
            font-size: 18px; /* Increase the font-size */
            color: black; /* Add a black text color */
            display: none; /* Make it into a block element to fill the whole list */
          }

          /* Links inside the dropdown */
          .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }

          .dropdown-content a:hover {background-color: #eee}

          .dropdown-content spam {
            font-size: 14px;
            color: gray;
            padding-left: 10px;
          }
        </style>

        <script type="text/javascript">
          function showDropdown() {
            document.getElementById("Dropdown_tiposObras").style.display="block";
            $("#tipo_obra").val("");
          }

          function filterDropdown() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("tipo_obra");
            filter = input.value.toUpperCase();
            div = document.getElementById("Dropdown_tiposObras");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
              txtValue = a[i].textContent || a[i].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
              } else {
                a[i].style.display = "none";
              }
            }
          }

          $("#Dropdown_tiposObras").click(function() {
            document.getElementById("Dropdown_tiposObras").style.display="none";
          });

          $("#livro").click(function() {
            var a = document.getElementsByTagName("a");
            $("#tipo_obra").val(a[0].getAttribute("value"));
          });
        </script>


        @if ($errors->any())
          <div class="alert alert-danger">
              Eu só funciono se inserir uma opção válida aqui.
          </div>
        @endif
        
        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit">Próximo</button>







        <!--<div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>-->
      </form>
    </div>
@endsection