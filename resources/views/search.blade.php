<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Palindrome</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>

<div id="app" class="container d-flex align-items-center justify-content-center min-vh-100 p-3">

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6">
            <search-component />
        </div>
    </div>

</div>


<script src="{{ asset('/js/manifest.js') }}"></script>
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
