@extends('admin.layout')

@section('title', 'Редактировать новость')
@section('page_title', 'Редактировать новость')

@section('content')
    <form class="admin-form" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="admin-field">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required>
            @error('title') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $news->slug) }}">
            <div class="admin-help">Слаг можно отредактировать вручную.</div>
            @error('slug') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="excerpt">Короткое описание</label>
            <textarea id="excerpt" name="excerpt">{{ old('excerpt', $news->excerpt) }}</textarea>
            @error('excerpt') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="content">Текст новости</label>
            <textarea id="content" name="content">{{ old('content', $news->content) }}</textarea>
            @error('content') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="cover_image">Обложка</label>
            <input type="file" id="cover_image" name="cover_image" accept=".jpg,.jpeg,.png,.webp,.gif">
            @if($news->cover_image)
                <div class="admin-help">Текущая обложка:</div>
                <img src="{{ Storage::disk('public')->url($news->cover_image) }}" alt="" class="admin-cover-preview">
            @endif
            @error('cover_image') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="published_at">Дата публикации</label>
            <input
                type="datetime-local"
                id="published_at"
                name="published_at"
                value="{{ old('published_at', $news->published_at?->format('Y-m-d\\TH:i')) }}"
            >
            <div class="admin-help">Новости на сайте показываются, если стоит галочка и дата в прошлом.</div>
            @error('published_at') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label>
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
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
        let slugTouched = slugInput.value.trim() !== toSlug(titleInput.value);

        slugInput.addEventListener('input', () => {
            slugTouched = true;
        });

        titleInput.addEventListener('input', () => {
            if (slugTouched) {
                return;
            }

            slugInput.value = toSlug(titleInput.value);
        });

        const uploadUrl = '{{ route('admin.news.upload') }}';
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        class NewsUploadAdapter {
            constructor(loader) {
                this.loader = loader;
                this.xhr = null;
            }

            upload() {
                return this.loader.file.then(file => new Promise((resolve, reject) => {
                    this._initRequest();
                    this._initListeners(resolve, reject, file);
                    this._sendRequest(file);
                }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                xhr.open('POST', uploadUrl, true);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.responseType = 'json';
            }

            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const genericError = `Не удалось загрузить файл: ${file.name}.`;

                xhr.addEventListener('error', () => reject(genericError));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;
                    if (!response || !(response.url || response.default)) {
                        return reject(response?.message || genericError);
                    }
                    resolve({ default: response.url || response.default });
                });
            }

            _sendRequest(file) {
                const data = new FormData();
                data.append('upload', file);
                this.xhr.send(data);
            }
        }

        function NewsUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new NewsUploadAdapter(loader);
            };
        }

        ClassicEditor.create(document.querySelector('#content'), {
            extraPlugins: [NewsUploadAdapterPlugin],
        }).catch(error => console.error(error));
    </script>
@endpush
