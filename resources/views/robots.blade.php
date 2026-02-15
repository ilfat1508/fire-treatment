User-agent: *
@if (config('app.seo_index'))
    Disallow: /admin
    Disallow: /login
    Disallow: /logout
    Disallow: /callback/store

    Sitemap: {{ config('app.url') }}/sitemap.xml
@else
    Disallow: /
@endif
