@extends('layouts.default')
@section('content')
  

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dados da obra</h4>

      <hr class="mb-4">

      <form class="needs-validation" novalidate action="/dados_obra" method="POST">
        @csrf
      

      	<div class="mb-3 ">
          <label>Título<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="aaa" placeholder="" required>

              {!! $errors->first('titulo', '<div class="alert alert-danger mt-3">Eu só funciono se você colocar uma informação válida aqui.</div>') !!}

          <label class="mt-3">Subtítulo</label>
          <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="" placeholder="">

          <label class="mt-3">Número da edição</label>
          <input type="number" class="form-control" id="edicao" name="edicao" min="0" step="1" value="" placeholder="">

              {!! $errors->first('edicao', '<div class="alert alert-danger mt-3">Aqui tem que ser um número e maior que zero.</div>') !!}

          <label class="mt-3">Local de publicação (cidade)<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="local_publicacao" name="local_publicacao" value="aaa" placeholder="" required>

              {!! $errors->first('local_publicacao', '<div class="alert alert-danger mt-3">Eu só funciono se você colocar uma informação válida aqui.</div>') !!}

          <label class="mt-3">Editora<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="editora" name="editora" value="aaa" placeholder="" required>

              {!! $errors->first('editora', '<div class="alert alert-danger mt-3">Eu só funciono se você colocar uma informação válida aqui.</div>') !!}

          <label class="mt-3">Ano de publicação<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="ano_publicacao" name="ano_publicacao" value="2020" placeholder="" required>

              {!! $errors->first('ano_publicacao', '<div class="alert alert-danger mt-3">Aqui é obrigado a preencher.</div>') !!}

          <label class="mt-3">Número de Páginas, Volumes ou Folhas</label>
          <input type="number" class="form-control" id="numero_paginas" min="0" step="1" name="numero_paginas" value="" placeholder="">

              {!! $errors->first('numero_paginas', '<div class="alert alert-danger mt-3">Aqui tem que ser um número e maior que zero.</div>') !!}

        </div>


        <hr class="mb-4">

          <div class="float-left"><a type="button" href="/autores" class="btn btn-light btn-lg" style="border: 1px solid gray;">Anterior</a></div>
          <div class="float-right"><button class="btn btn-primary btn-lg float-right" type="submit">Próximo</button></div>

      </form>
    </div>
@endsection