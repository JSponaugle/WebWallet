@include('layout.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="container-fluid">
    <div class="row" style="margin-top:5%;"></div>
    @include('layout.design1.wallet')
    <div class="row"></div>
    <div class="row"></div>
</div>
</body>
@include('layout.footer')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>