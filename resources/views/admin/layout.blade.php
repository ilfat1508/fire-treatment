<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админка')</title>
    <style>
        :root {
            color-scheme: light;
        }
        body {
            font-family: "Instrument Sans", Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            color: #0f172a;
        }
        .admin-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 16px 48px;
        }
        .admin-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }
        .admin-topbar h1 {
            margin: 0;
            font-size: 28px;
        }
        .admin-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }
        .admin-nav a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            border: 1px solid #cbd5e1;
            color: #334155;
            padding: 8px 12px;
            border-radius: 8px;
            background: #fff;
            font-weight: 500;
        }
        .admin-nav a.active {
            background: #0f172a;
            color: #fff;
            border-color: #0f172a;
        }
        .admin-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }
        .admin-table th,
        .admin-table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: top;
        }
        .admin-table th {
            background: #f8fafc;
            font-size: 14px;
        }
        .admin-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .admin-btn {
            border: 1px solid #cbd5e1;
            background: #fff;
            border-radius: 6px;
            padding: 6px 10px;
            cursor: pointer;
            text-decoration: none;
            color: #0f172a;
            font-weight: 500;
        }
        .admin-btn.primary {
            background: #0f172a;
            color: #fff;
            border-color: #0f172a;
        }
        .admin-btn.success {
            color: #166534;
            border-color: #bbf7d0;
            background: #f0fdf4;
        }
        .admin-btn.warn {
            color: #92400e;
            border-color: #fde68a;
            background: #fffbeb;
        }
        .admin-btn.danger {
            color: #b91c1c;
            border-color: #fecaca;
            background: #fef2f2;
        }
        .admin-alert {
            margin-bottom: 14px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 10px 12px;
            border-radius: 8px;
        }
        .admin-empty {
            padding: 18px 12px;
            color: #64748b;
        }
        .admin-form {
            display: grid;
            gap: 16px;
        }
        .admin-field label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .admin-field input[type="text"],
        .admin-field input[type="datetime-local"],
        .admin-field textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 15px;
            box-sizing: border-box;
        }
        .admin-field textarea {
            min-height: 160px;
        }
        .admin-help {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }
        .admin-error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 6px;
        }
        .admin-cover-preview {
            width: 120px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .admin-pagination {
            margin-top: 16px;
        }
        .logout-form {
            margin: 0;
        }
        @media (max-width: 720px) {
            .admin-topbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .admin-table th,
            .admin-table td {
                padding: 10px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-wrap">
    <div class="admin-topbar">
        <h1>@yield('page_title', 'Админка')</h1>
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-btn">Выйти</button>
        </form>
    </div>

    <nav class="admin-nav">
        <a href="{{ route('admin.callback-requests.index') }}" class="{{ request()->routeIs('admin.callback-requests.*') ? 'active' : '' }}">
            Заявки обратного звонка
        </a>
        <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            Новости
        </a>
    </nav>

    @if(session('status'))
        <div class="admin-alert">{{ session('status') }}</div>
    @endif

    @yield('content')
</div>

@stack('scripts')
</body>
</html>
