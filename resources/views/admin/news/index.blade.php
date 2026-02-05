@extends('admin.layout')

@section('title', 'Новости')
@section('page_title', 'Новости')

@section('content')
    <div class="admin-actions" style="margin-bottom: 14px;">
        <a href="{{ route('admin.news.create') }}" class="admin-btn primary">Добавить новость</a>
    </div>

    <div class="admin-card">
        @if($news->count() === 0)
            <div class="admin-empty">Новостей пока нет.</div>
        @else
            <table class="admin-table">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Статус</th>
                    <th>Дата публикации</th>
                    <th>Превью</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->title }}</strong>
                            <div class="admin-help">/{{ $item->slug }}</div>
                        </td>
                        <td>{{ $item->is_published ? 'Опубликовано' : 'Черновик' }}</td>
                        <td>{{ $item->published_at?->format('d.m.Y H:i') ?? '—' }}</td>
                        <td>
                            @if($item->cover_image)
                                <img src="{{ Storage::disk('public')->url($item->cover_image) }}" alt="" class="admin-cover-preview">
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            <div class="admin-actions">
                                <a href="{{ route('admin.news.edit', $item) }}" class="admin-btn">Редактировать</a>
                                <form method="POST" action="{{ route('admin.news.destroy', $item) }}" onsubmit="return confirm('Удалить эту новость?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn danger">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="admin-pagination">
        {{ $news->links() }}
    </div>
@endsection
