@extends("layout")
@section("pageTitle", "Produtos")
@section("content")

    <h1>Marcas</h1>
    <a href="{{ route('home.index') }}">Página Inicial</a>
    <a href="{{ route('products.create') }}">Incluir produto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Stock</th>
            <th>Preço (R$)</th>
            <th>Foto</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @if($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" style="max-width: 50px; max-height: 50px;">
                    @endif
                </td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar Produto</a>
                    <a href="{{ route('products.editStock', ['id' => $product->id]) }}">Editar Stock</a>
                    <br>
                    <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection