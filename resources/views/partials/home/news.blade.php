<section class="news-section">
    <div class="container">
        <div class="news-section__header">
            <h2>Новости</h2>
            <a href="{{ route('news.index') }}" class="news-section__all">Все новости</a>
        </div>

        @if($latestNews->count() === 0)
            <p class="news-section__empty">Пока нет опубликованных новостей.</p>
        @else
            <div class="news-grid">
                @foreach($latestNews as $item)
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
    </div>
</section>
