@extends("layout")
@section("pageTitle", "Atualização de Stock")
@section("content")

    <h1>Atualização de Stock</h1>
    <a href="{{ route('products.index') }}">Voltar</a>
    
    <div class="">Estoque atual do produto {{ $product->name }}: {{ $product->stock }}</div>

    <br>
    
    <form action="{{ route('products.stock') }}" method="POST">
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $product->id }}">
      <input type="radio" name="attStock" id="entrada" value="entrada">
      <label for="entrada">Entrada - soma a quantidade ao estoque atual;</label>
      <br>
      <input type="radio" name="attStock" id="saida" value="saida">
      <label for="saida">Saída - subtrai a quantidade do estoque atual;</label>
      <br>
      <input type="radio" name="attStock" id="balanco" value="balanco">
      <label for="balanco">Balanço - atribui o valor passado ao estoque do produto</label>
      <br>
      <label for="quantidade">Quantidade</label>
      <br>
      <input type="number" name="quantidade" id="quantidade">
      <br>
      <button type="submit" id="salvar">Salvar</button>
    </form>
@endsection