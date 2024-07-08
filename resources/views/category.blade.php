@extends("layout")
@section("pageTitle", "Gerenciar Categoria")
@section("content")

    <div class="container">
        <div class="box">
            <div id="title">
                <h1>Gerenciar Categoria</h1>
            </div>
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
                <input type="text" name="name" id="name" value="{{ $category->name }}">
                <label for="description">
                    <b>
                        Descrição:</label>
                    </b>    
                <input type="text" name="description" id="description" value="{{ $category->description }}">
                <button type="submit" id="salvar">Salvar</button>
            </form>
        </div>
    </div>

@endsection