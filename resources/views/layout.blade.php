<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("pageTitle") - ERP</title>
  <link rel="shortcut icon" href="{{ asset('icon.png') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
  @include("includes.errors")
  @yield("content")
</body>
</html>