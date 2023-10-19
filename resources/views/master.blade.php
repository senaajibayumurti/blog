<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
    <title>Tes</title>
</head>
<body>
    @include('header')
    @yield('content')

    <script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
    })
    </script>
</body>
</html>