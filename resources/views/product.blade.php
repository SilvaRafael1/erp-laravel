@extends("layout")
@section("pageTitle", "Gerenciar Produto")
@section("content")

    <div class="container">
        <div class="box">
            <div id="title">
                <h1>Gerenciar Produto</h1>
            </div>
            <div id="voltar">
                <a href="{{ route('products.index') }}">Voltar</a>
            </div>

            @include("includes.errors")
            
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                <label for="name">
                    <b>
                        Nome:</label>
                    </b>    
                <input type="text" name="name" id="name" value="{{ $product->name }}">
                <label for="description">
                    <b>
                        Descrição:</label>
                    </b>    
                <input type="text" name="description" id="description" value="{{ $product->description }}">
                <label for="price">
                    <b>
                        Preço:</label>
                    </b>    
                <input type="number" name="price" id="price" step=".01" min="0" value="{{ $product->price }}">
                <label for="photo">
                    <b>
                        Foto:</label>
                    </b>    
                <input type="file" name="photo" id="photo">
                <label for="brand_id">
                    <b>
                        Marca:</label>
                    </b>    
                <select name="brand_id" id="brand_id">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" 
                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                    >
                        {{ $brand->name }}
                    </option>
                  @endforeach
                </select>
                <label for="category_id">
                    <b>
                        Categoria:</label>
                    </b>    
                <select name="category_id" id="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $product->category_id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                <button type="submit" id="salvar">Salvar</button>
            </form>
        </div>
    </div>

@endsection