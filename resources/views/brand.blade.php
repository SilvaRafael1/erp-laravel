@extends("layout")
@section("pageTitle", "Gerenciar Marca")
@section("content")

    <div class="container">
        <h1>Gerenciar Marca</h1>
        <div class="box">
            <div id="voltar">
                <a href="{{ route('brands.index') }}">Voltar</a>
            </div>
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $brand->id }}">
                <label for="name">
                    <b>
                        Nome:</label>
                    </b>    
                <br>
                <input type="text" name="name" id="name" value="{{ $brand->name }}">
                <br>
                <label for="photo">
                    <b>
                        Logo:</label>
                    </b>    
                <br>
                <input type="file" name="photo" id="photo">
                <br>
                <button type="submit" id="salvar">Salvar</button>
            </form>
        </div>
    </div>

@endsection