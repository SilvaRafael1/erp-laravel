@extends("layout")
@section("pageTitle", "Categorias")
@section("content")

    <h1>Categorias</h1>
    <a href="{{ route('home.index') }}">Página Inicial</a>
    <a href="{{ route('categories.create') }}">Incluir categoria</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}">Editar</a>
                    <br>
                    <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection