@extends('layouts.default')
@section('content')
  

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dados da obra</h4>

      <hr class="mb-4">

      <form class="needs-validation" novalidate action="/qnt_autores" method="POST">
        @csrf
      

      	<div class="mb-3" id="autores">
          <label for="autores">Quantidade de autores<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="qnt_autores" name="qnt_autores" value="{{ $qnt_autores }}" placeholder="" required>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            Eu só funciono se inserir um número válido aqui.
        </div>
        @endif


        <hr class="mb-4">

          <div class="float-left"><a type="button" href="/" class="btn btn-light btn-lg" style="border: 1px solid gray;">Anterior</a></div>
          <div class="float-right"><button class="btn btn-primary btn-lg float-right" type="submit">Próximo</button></div>

      </form>
    </div>
@endsection