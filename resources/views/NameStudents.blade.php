<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcom</h1>
        @foreach ($students as $student)
            <h4>{{ $student->student->name }}</h4>
        @endforeach
</body>
</html>