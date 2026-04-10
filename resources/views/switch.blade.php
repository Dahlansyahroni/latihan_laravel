<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @switch($role)
    @case('admin')
    <h1>Selamat Datang Admin</h1>
    @break
    @case('user')
    <h1>Selamat Datang User</h1>
    @break
    @default
    <h1>Peran tidak dikenal</h1>
    @endswitch

</body>

</html>