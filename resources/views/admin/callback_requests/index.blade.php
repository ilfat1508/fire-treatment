@extends('admin.layout')

@section('title', 'Заявки обратного звонка')
@section('page_title', 'Заявки обратного звонка')

@section('content')
    <div class="admin-nav" style="margin-top: -6px;">
        <a href="{{ route('admin.callback-requests.index', ['tab' => 'unread']) }}" class="{{ $tab === 'unread' ? 'active' : '' }}">
            Непрочитанные
        </a>
        <a href="{{ route('admin.callback-requests.index', ['tab' => 'read']) }}" class="{{ $tab === 'read' ? 'active' : '' }}">
            Прочитанные
        </a>
    </div>

    <div class="admin-card">
        @if($callbackRequests->count() === 0)
            <div class="admin-empty">Заявок в этом разделе пока нет.</div>
        @else
            <table class="admin-table">
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
                        <td>
                            @if($callbackRequest->read_at)
                                <form method="POST" action="{{ route('admin.callback-requests.mark-unread', $callbackRequest) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="admin-btn warn">Пометить непрочитанным</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.callback-requests.mark-read', $callbackRequest) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="admin-btn success">Пометить прочитанным</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="admin-pagination">
        {{ $callbackRequests->links() }}
    </div>
@endsection
