@extends('admin.layout')

@section('title', 'Создать новость')
@section('page_title', 'Создать новость')

@section('content')
    <form class="admin-form" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="admin-field">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
            <div class="admin-help">Если оставить пустым, слаг будет создан из заголовка.</div>
            @error('slug') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="excerpt">Короткое описание</label>
            <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
            @error('excerpt') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="content">Текст новости</label>
            <textarea id="content" name="content">{{ old('content') }}</textarea>
            @error('content') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="cover_image">Обложка</label>
            <input type="file" id="cover_image" name="cover_image" accept=".jpg,.jpeg,.png,.webp,.gif">
            @error('cover_image') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="published_at">Дата публикации</label>
            <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}">
            <div class="admin-help">Если пусто, новость не появится на сайте.</div>
            @error('published_at') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label>
                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                Опубликовать
            </label>
        </div>

        <div class="admin-actions">
            <button type="submit" class="admin-btn primary">Сохранить</button>
            <a href="{{ route('admin.news.index') }}" class="admin-btn">Назад</a>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const toSlug = (value) => value
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        let slugTouched = false;

        slugInput.addEventListener('input', () => {
            slugTouched = true;
        });

        titleInput.addEventListener('input', () => {
            if (slugTouched || slugInput.value.trim() !== '') {
                return;
            }

            slugInput.value = toSlug(titleInput.value);
        });

        ClassicEditor.create(document.querySelector('#content'), {
            simpleUpload: {
                uploadUrl: '{{ route('admin.news.upload') }}',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }
        }).catch(error => console.error(error));
    </script>
@endpush
