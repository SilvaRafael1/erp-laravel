@extends("layout")
@section("pageTitle", "Gerenciar Categoria")
@section("content")

    <div class="container">
        <h1>Gerenciar Categoria</h1>
        <div class="box">
            <div id="voltar">
                <a href="{{ route('categories.index') }}">Voltar</a>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $category->id }}">
                <label for="name">
                    <b>
                        Nome:</label>
                    </b>    
                <br>
                <input type="text" name="name" id="name" value="{{ $category->name }}">
                <br>
                <label for="description">
                    <b>
                        Descrição:</label>
                    </b>    
                <br>
                <input type="text" name="description" id="description" value="{{ $category->description }}">
                <br>
                <button type="submit" id="salvar">Salvar</button>
            </form>
        </div>
    </div>

@endsection