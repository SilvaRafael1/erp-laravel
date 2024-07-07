@extends("layout")
@section("pageTitle", "Marcas")
@section("content")

    <h1>Marcas</h1>
    <a href="{{ route('home.index') }}">Página Inicial</a>
    <a href="{{ route('brands.create') }}">Incluir marca</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Logo</th>
            <th>Ações</th>
        </tr>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    @if($brand->photo)
                        <img src="{{ asset('storage/' . $brand->photo) }}" alt="{{ $brand->name }}" style="max-width: 50px; max-height: 50px;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('brands.edit', ['id' => $brand->id]) }}">Editar</a>
                    <br>
                    <form action="{{ route('brands.delete', ['id' => $brand->id]) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection