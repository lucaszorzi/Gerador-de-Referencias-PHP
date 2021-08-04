@extends('layouts.default')
@section('content')
  

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dados da obra</h4>

      <hr class="mb-4">

      <form class="needs-validation" novalidate action="/meio_publicacao" method="POST">
        @csrf
      

        <div class="mb-3" id="container1">

          <label class="mt-3">Meio de publicação<span style="color: red;">*</span></label>
          <select class="form-control" id="meio_publicacao" name="meio_publicacao" onchange="select()" required>
            <option value="impresso">Impresso</option>
            <option value="online">Online</option>
            <option value="midias">Demais mídias digitais (E-book, CD-ROM, DVD, ...)</option>
          </select>

              {!! $errors->first('meio_publicacao', '<div class="alert alert-danger mt-3">Eu só funciono se você escolher uma opção válida aqui.</div>') !!}

          <div id="publicacao_online" style="display: none">
            <label class="mt-3">Disponível em:<span style="color: red;">*</span></label>
            <input type="text" name="disponivel_em" class="form-control" placeholder="" autocomplete="off">

            <label class="mt-3">Acesso em:<span style="color: red;">*</span></label>
            <input type="date" name="acesso_em" class="form-control" placeholder="" autocomplete="off">
          </div>

          <div id="publicacao_midias" style="display: none">
            <label class="mt-3">Descrição física:</label>
            <input type="text" name="descricao_fisica" class="form-control" placeholder="" autocomplete="off">

            <label class="mt-3">Versão:</label>
            <input type="text" name="versao" class="form-control" placeholder="" autocomplete="off">
          </div>

        </div>


        <script type="text/javascript">
          
          $(document).ready(function() {
            var select = document.getElementById('meio_publicacao');
            select.addEventListener('change', select);
          });

          function select(){
            var wrapper = $("#container1");
            var option = document.getElementById("meio_publicacao");

            if (option.value == "impresso"){
              document.getElementById('publicacao_online').style.display = 'none';
              document.getElementById('publicacao_midias').style.display = 'none';
            }
            else if (option.value == "online"){
              document.getElementById('publicacao_online').style.display = '';
              document.getElementById('publicacao_midias').style.display = 'none';
            }
            else if(option.value == "midias"){
              document.getElementById('publicacao_online').style.display = 'none';
              document.getElementById('publicacao_midias').style.display = '';
            }


          }
        </script>


        <hr class="mb-4">

          <div class="float-left"><a type="button" href="/autores" class="btn btn-light btn-lg" style="border: 1px solid gray;">Anterior</a></div>
          <div class="float-right"><button class="btn btn-primary btn-lg float-right" type="submit">Próximo</button></div>

      </form>
    </div>
@endsection