<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки обратного звонка</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8fafc; margin: 0; color: #0f172a; }
        .wrap { max-width: 1100px; margin: 0 auto; padding: 24px 16px 40px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .tabs { display: flex; gap: 8px; margin-bottom: 16px; }
        .tab { display: inline-block; text-decoration: none; border: 1px solid #cbd5e1; color: #334155; padding: 8px 12px; border-radius: 8px; }
        .tab.active { background: #0f172a; color: #fff; border-color: #0f172a; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #e2e8f0; text-align: left; vertical-align: top; }
        th { background: #f8fafc; font-size: 14px; }
        .actions { white-space: nowrap; }
        .btn { border: 1px solid #cbd5e1; background: #fff; border-radius: 6px; padding: 6px 10px; cursor: pointer; }
        .btn-read { color: #166534; border-color: #bbf7d0; background: #f0fdf4; }
        .btn-unread { color: #92400e; border-color: #fde68a; background: #fffbeb; }
        .alert { margin-bottom: 14px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 10px 12px; border-radius: 8px; }
        .empty { padding: 18px 12px; color: #64748b; }
        .pagination { margin-top: 14px; }
        .logout-form { margin: 0; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="topbar">
        <h1>Заявки обратного звонка</h1>
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn">Выйти</button>
        </form>
    </div>

    @if(session('status'))
        <div class="alert">{{ session('status') }}</div>
    @endif

    <div class="tabs">
        <a href="{{ route('admin.callback-requests.index', ['tab' => 'unread']) }}" class="tab {{ $tab === 'unread' ? 'active' : '' }}">
            Непрочитанные
        </a>
        <a href="{{ route('admin.callback-requests.index', ['tab' => 'read']) }}" class="tab {{ $tab === 'read' ? 'active' : '' }}">
            Прочитанные
        </a>
    </div>

    <div class="card">
        @if($callbackRequests->count() === 0)
            <div class="empty">Заявок в этом разделе пока нет.</div>
        @else
            <table>
                <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Создано</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($callbackRequests as $callbackRequest)
                    <tr>
                        <td>{{ $callbackRequest->fio }}</td>
                        <td>{{ $callbackRequest->phone }}</td>
                        <td>{{ $callbackRequest->created_at?->format('d.m.Y H:i') }}</td>
                        <td class="actions">
                            @if($callbackRequest->read_at)
                                <form method="POST" action="{{ route('admin.callback-requests.mark-unread', $callbackRequest) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-unread">Пометить непрочитанным</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.callback-requests.mark-read', $callbackRequest) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-read">Пометить прочитанным</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="pagination">
        {{ $callbackRequests->links() }}
    </div>
</div>
</body>
</html>
