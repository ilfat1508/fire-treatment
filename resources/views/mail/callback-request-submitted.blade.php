<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая заявка на обратный звонок</title>
</head>
<body>
    <h1>Новая заявка на обратный звонок</h1>

    <p><strong>ФИО:</strong> {{ $callbackRequest->fio }}</p>
    <p><strong>Телефон:</strong> {{ $callbackRequest->phone }}</p>
    <p><strong>Дата:</strong> {{ $callbackRequest->created_at?->format('d.m.Y H:i') }}</p>
</body>
</html>
