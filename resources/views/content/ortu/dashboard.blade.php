<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Dashboard Orang Tua</title>
</head>
<body>
    <!-- Jumbotron -->
    <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
        <h2>Hello Orang Tua!</h2>
        <p>
        This is a simple hero unit, a simple jumbotron-style component for calling extra
        attention to featured content or information.
        </p>
    
        <hr class="my-4" />
    
        <p>
        It uses utility classes for typography and spacing to space content out within the
        larger container.
        </p>
        <a href="{{ route('logout') }}" class="btn btn-sm btn-primary">Logout</a>
    </div>
    <!-- Jumbotron -->
</body>
</html>