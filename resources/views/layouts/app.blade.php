<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
dir="{{ app()->getLocale()=='ar' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Smart Incubator')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
     @if(app()->getLocale()=='ar')
<style>
body{
direction:rtl;
text-align:right;
font-family:'Cairo',sans-serif;
}
.sidebar{
right:0;
left:auto;
}
.main-content{
margin-right:270px;
margin-left:0;
}
</style>
@endif
</head>

<body>

<div class="app-layout">

    @include('partials.sidebar')

    <div class="main-wrapper">

        @include('partials.navbar')

        <main class="page-content">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>
<div class="d-flex gap-2">

<a href="{{ route('change.language','fr') }}"
class="btn btn-sm btn-outline-primary">

🇫🇷 FR

</a>

<a href="{{ route('change.language','ar') }}"
class="btn btn-sm btn-outline-success">

🇩🇿 AR

</a>

</div>
    @endif

    @yield('content')

</main>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>