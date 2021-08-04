@extends('layouts.default')
@section('content')


<div class="col-md-8 order-md-1">
	<h4 class="mb-3">Dados da obra</h4>

	<hr class="mb-4">

	<form class="needs-validation" novalidate action="/autores" method="POST">
		@csrf


		<div class="mb-3" id="container1">

			<div class="float-right pt-2">
				<input class="form-check-input" type="checkbox" value="" id="sem_autor" onclick="desable_autor()">
				<label class="form-check-label" for="defaultCheck1">Autor desconhecido</label>
			</div>

			<div class="float-left">
				<button class="btn btn-primary" id="add_autor">Adicionar autor &nbsp; 
					<span style="font-size:16px; font-weight:bold;">+ </span>
				</button>
			</div>

			<input type="hidden" id="qnt_autores" name="qnt_autores">
			<br>
			<br>

			@if($autores != null)
				@foreach ($autores as $autor)
    				<div class="autores_div"><br>
    					<label>Nome do autor<span style="color: red;">*</span></label>
    					<input type="text" name="autor[]" value="{{ $autor }}" class="form-control" placeholder="" autocomplete="off" required>
    					<a href="#" class="delete">Delete</a>
    				</div>
				@endforeach
			@endif

			@if ($errors->any())
	          <div class="alert alert-danger" id="error">
	              Você tem que indicar os autores ou se é desconhecido!
	          </div>
        	@endif

		</div>

		<script type="text/javascript">
			var x;
			
			$(document).ready(function() {
				var wrapper = $("#container1");
				var add_button = $("#add_autor");

				if({{ $qnt_autores }} == -1){
					document.getElementById("sem_autor").checked = true;
					document.getElementById("add_autor").disabled = true;
				}
				else
					document.getElementById("sem_autor").checked = false;

				x={{ $qnt_autores }};
            document.getElementById("qnt_autores").setAttribute("value", {{ $qnt_autores }});

				$(add_button).click(function(e) {
					e.preventDefault();
					x++;
               $(wrapper).append('<div class="autores_div"><br><label>Nome do autor<span style="color: red;">*</span></label><input type="text" name="autor[]" id="autor['+ x +']" class="form-control" placeholder="" autocomplete="off" required><a href="#" class="delete">Delete</a></div>');
               	document.getElementById("autor["+ x + "]").focus();
               	document.getElementById("qnt_autores").setAttribute("value", x);            	
               	document.getElementById("error").remove(); 
        		});

				$(wrapper).on("click", ".delete", function(e) {
					e.preventDefault();
					$(this).parent('div').remove();
					x--;
					document.getElementById("qnt_autores").setAttribute("value", x);
				})
			});

			function desable_autor() {
				var checkBox = document.getElementById("sem_autor");
				x=0;
				if (checkBox.checked == true){
			   	document.getElementById("add_autor").disabled = true;
			   	$("div").remove(".autores_div"); //removes all <div> elements with class="autores_div"
			   	document.getElementById("qnt_autores").setAttribute("value", -1);
			   	document.getElementById("error").remove();
			  	} else {
			   	document.getElementById("add_autor").disabled = false;
					document.getElementById("qnt_autores").setAttribute("value", 0);
			  	}
			}
		</script>


		<hr class="mb-4">

		<div class="float-left"><a type="button" href="/" class="btn btn-light btn-lg" style="border: 1px solid gray;">Anterior</a></div>
		<div class="float-right"><button class="btn btn-primary btn-lg float-right" type="submit">Próximo</button></div>

	</form>
</div>

@endsection