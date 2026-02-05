<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новости</title>
    <link rel="icon" href="{{ asset('images/icons/icon.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif
</head>
<body>
<main class="container" style="padding: 32px 16px 48px;">
    <h1 style="margin-bottom: 20px;">Новости</h1>

    @if($news->count() === 0)
        <p>Пока нет опубликованных новостей.</p>
    @else
        <div class="news-grid">
            @foreach($news as $item)
                <article class="news-card">
                    <a href="{{ route('news.show', $item->slug) }}" class="news-card__link">
                        @if($item->cover_image)
                            <div class="news-card__media">
                                <img src="{{ Storage::disk('public')->url($item->cover_image) }}" alt="{{ $item->title }}">
                            </div>
                        @endif
                        <div class="news-card__body">
                            <h3>{{ $item->title }}</h3>
                            @if($item->published_at)
                                <div class="news-card__date">{{ $item->published_at->format('d.m.Y') }}</div>
                            @endif
                            @if($item->excerpt)
                                <p>{{ $item->excerpt }}</p>
                            @endif
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    @endif

    <div style="margin-top: 20px;">
        {{ $news->links() }}
    </div>
</main>
</body>
</html>
