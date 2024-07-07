<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("pageTitle") - ERP</title>
  <!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> -->
</head>
<body>
  @include("includes.errors")
  @yield("content")
</body>
</html>