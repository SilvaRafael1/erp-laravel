@extends("layout")
@section("pageTitle", "Página Inicial")
@section("content")

<h1>Home</h1>

<a href="{{ route('brands.index') }}">Marcas</a>
<br>
<a href="{{ route('categories.index') }}">Categorias</a>

@endsection