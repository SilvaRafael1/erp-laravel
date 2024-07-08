@if($errors->any())
    <div class="errors">
        <h3>Erro:</h1>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif