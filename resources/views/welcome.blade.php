<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>{{config('app.name')}}</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  
  <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset("assets/fontawesome-free-5.15.3-web/css/all.min.css")}}">
  
  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
</head>
<body>

<section id="app" class="container-fluid"></section>

<script>
    const BASEPATH = '{{url('/')}}'
</script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
