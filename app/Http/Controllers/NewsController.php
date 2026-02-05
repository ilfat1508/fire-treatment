<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(12);

        return view('news.index', compact('news'));
    }

    public function show(string $slug): View
    {
        $news = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', compact('news'));
    }
}
