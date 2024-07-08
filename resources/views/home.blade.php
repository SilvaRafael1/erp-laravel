@extends("layout")
@section("pageTitle", "Página Inicial")
@section("content")

<div class="container">
  <div class="box">
    <div id="title">
      <h1>Página Inicial</h1>
    </div>

    <div class="links">
      <a href="{{ route('brands.index') }}">Marcas</a>
      <a href="{{ route('categories.index') }}">Categorias</a>
      <a href="{{ route('products.index') }}">Produtos</a>
    </div>
  </div>
</div>


@endsection