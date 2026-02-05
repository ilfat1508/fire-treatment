<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->title }}</title>
    <link rel="icon" href="{{ asset('images/icons/icon.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif
</head>
<body>
<main class="container" style="padding: 32px 16px 48px;">
    <a href="{{ route('news.index') }}" style="display:inline-block; margin-bottom: 18px;">← Все новости</a>
    <h1 style="margin-bottom: 10px;">{{ $news->title }}</h1>
    @if($news->published_at)
        <div class="news-card__date" style="margin-bottom: 16px;">
            {{ $news->published_at->format('d.m.Y') }}
        </div>
    @endif
    @if($news->cover_image)
        <div class="news-hero">
            <img src="{{ Storage::disk('public')->url($news->cover_image) }}" alt="{{ $news->title }}">
        </div>
    @endif
    <article class="news-content">
        {!! $news->content !!}
    </article>
</main>
</body>
</html>
