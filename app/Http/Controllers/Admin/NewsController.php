<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:news,slug'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $this->buildSlug($request, null);
        if (News::where('slug', $validated['slug'])->exists()) {
            return back()
                ->withErrors(['slug' => 'Такой slug уже существует.'])
                ->withInput();
        }
        $validated['is_published'] = (bool) $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('news/covers', 'public');
        }

        $news = News::create($validated);

        return redirect()
            ->route('admin.news.edit', $news)
            ->with('status', 'Новость создана.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:news,slug,' . $news->id],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $this->buildSlug($request, $news);
        if (News::where('slug', $validated['slug'])->where('id', '!=', $news->id)->exists()) {
            return back()
                ->withErrors(['slug' => 'Такой slug уже существует.'])
                ->withInput();
        }
        $validated['is_published'] = (bool) $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            $this->deleteCoverImage($news);
            $validated['cover_image'] = $request->file('cover_image')->store('news/covers', 'public');
        }

        $news->update($validated);

        return redirect()
            ->route('admin.news.edit', $news)
            ->with('status', 'Новость обновлена.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deleteCoverImage($news);
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('status', 'Новость удалена.');
    }

    private function buildSlug(Request $request, ?News $news): string
    {
        $inputSlug = trim((string) $request->input('slug'));

        if ($inputSlug !== '') {
            return Str::slug($inputSlug);
        }

        if ($news) {
            return $news->slug;
        }

        return Str::slug((string) $request->input('title'));
    }

    private function deleteCoverImage(News $news): void
    {
        if (! $news->cover_image) {
            return;
        }

        $disk = Storage::disk('public');

        if ($disk->exists($news->cover_image)) {
            $disk->delete($news->cover_image);
        }
    }
}
