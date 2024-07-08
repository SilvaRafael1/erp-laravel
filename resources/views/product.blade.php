@extends("layout")
@section("pageTitle", "Gerenciar Produto")
@section("content")

    <div class="container">
        <h1>Gerenciar Produto</h1>
        <div class="box">
            <div id="voltar">
                <a href="{{ route('products.index') }}">Voltar</a>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                <label for="name">
                    <b>
                        Nome:</label>
                    </b>    
                <br>
                <input type="text" name="name" id="name" value="{{ $product->name }}">
                <br>
                <label for="description">
                    <b>
                        Descrição:</label>
                    </b>    
                <br>
                <input type="text" name="description" id="description" value="{{ $product->description }}">
                <br>
                <label for="price">
                    <b>
                        Preço:</label>
                    </b>    
                <br>
                <input type="number" name="price" id="price" step=".01" min="0" value="{{ $product->price }}">
                <br>
                <label for="photo">
                    <b>
                        Foto:</label>
                    </b>    
                <br>
                <input type="file" name="photo" id="photo">
                <br>
                <label for="brand_id">
                    <b>
                        Marca:</label>
                    </b>    
                <br>
                <select name="brand_id" id="brand_id">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" 
                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                    >
                        {{ $brand->name }}
                    </option>
                  @endforeach
                </select>
                <br>
                <label for="category_id">
                    <b>
                        Categoria:</label>
                    </b>    
                <br>
                <select name="category_id" id="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $product->category_id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                <br>
                <button type="submit" id="salvar">Salvar</button>
            </form>
        </div>
    </div>

@endsection