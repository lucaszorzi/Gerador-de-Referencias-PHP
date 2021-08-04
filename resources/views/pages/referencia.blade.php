@extends('layouts.default')
@section('content')

<div class="col-md-8 order-md-1">
  <h4 class="mb-3">Referência</h4>

  <hr class="mb-4">

  <div class="mb-3">
    <div class="jumbotron">
      <div class="row">
        <p id="referencia" class="lead">{{ $referencia }}</p>
        <button type="button" class="btn btn-secondary" onclick="copy_clipboard('#referencia')">Copiar</button>
      </div>
      <hr class="my-4">
      <p>Citação com referência ao autor no meio texto: {{ $autores }} ({{ $ano_publicacao }})</p>
      <p>Citação com referência ao autor no fim texto: ({{ $autores }}, {{ $ano_publicacao }})</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </p>

    </div>

  </div>
</div>

<script type="text/javascript">

  function copy_clipboard(element){
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    alert("Referência copiada!");
  }
</script>
@endsection