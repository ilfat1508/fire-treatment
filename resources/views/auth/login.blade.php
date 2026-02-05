<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админку</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 32px 16px; color: #1f2937; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 24px; }
        h1 { margin: 0 0 16px; font-size: 24px; }
        .field { margin-bottom: 12px; }
        label { display: block; font-size: 14px; margin-bottom: 6px; }
        input[type="email"], input[type="password"] { width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; }
        .checkbox { display: flex; align-items: center; gap: 8px; margin: 12px 0; }
        .error { color: #b91c1c; margin-bottom: 10px; font-size: 14px; }
        button { width: 100%; border: none; background: #111827; color: #fff; padding: 10px; border-radius: 8px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h1>Вход в админку</h1>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="field">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <label class="checkbox">
            <input type="checkbox" name="remember" value="1">
            <span>Запомнить меня</span>
        </label>

        <button type="submit">Войти</button>
    </form>
</div>
</body>
</html>
