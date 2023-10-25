<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pendataan Buku</title>
</head>
<body class="px-3">
    @include('header')
    <div class="container-fluid">
        @yield('content')
    </div>

    <script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
    });
    </script>
</body>
</html>