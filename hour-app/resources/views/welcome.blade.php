<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Uygulaması</title>
</head>
<body>
    @if (session("message"))
        <h1>{{ session("message") }}</h1>
    @endif
</body>
</html>
