@extends("layout")
@section("pageTitle", "Atualização de Stock")
@section("content")
<div class="container">
  <div class="box">
    <div id="title">
      <h1>Atualização de Stock</h1>
    </div>

    <a href="{{ route('products.index') }}">Voltar</a>

    @include("includes.errors")
    
    <div class="estoque">Estoque atual do produto <b>{{ $product->name }}: {{ $product->stock }}</b></div>

    <form action="{{ route('products.stock') }}" method="POST">
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $product->id }}">
      <div class="radio">
        <input type="radio" name="attStock" id="entrada" value="entrada">
        <label for="entrada"><b>Entrada</b> - soma a quantidade ao estoque atual;</label>
        <br>
        <input type="radio" name="attStock" id="saida" value="saida">
        <label for="saida"><b>Saída</b> - subtrai a quantidade do estoque atual;</label>
        <br>
        <input type="radio" name="attStock" id="balanco" value="balanco">
        <label for="balanco"><b>Balanço</b> - atribui o valor passado ao estoque do produto</label>
      </div>
      <label for="quantidade"><b>Quantidade:</b></label>
      <input type="number" name="quantidade" id="quantidade">
      <button type="submit" id="salvar">Salvar</button>
    </form>
  </div>
</div>

@endsection