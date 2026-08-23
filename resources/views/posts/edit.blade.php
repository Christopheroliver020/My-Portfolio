<x-app-layout>

    <div class="post-edit-page">

        <div class="post-edit-container">

            {{-- =====================================================
                 HEADER
                 ===================================================== --}}

            <header class="post-edit-header">

                <div class="post-edit-header-content">

                    <span class="post-edit-eyebrow">
                        CONTENT MANAGEMENT
                    </span>

                    <h1 class="post-edit-title">
                        Edit Post
                    </h1>

                    <p class="post-edit-description">
                        Update your portfolio post, media, and publishing settings.
                    </p>

                </div>

                <div class="post-edit-actions">

                    <a
                        href="{{ route('posts.index') }}"
                        class="post-edit-back"
                    >
                        <span>←</span>
                        <span>Back to Posts</span>
                    </a>

                    <a
                        href="{{ route('dashboard') }}"
                        class="post-edit-dashboard"
                    >
                        Dashboard
                    </a>

                </div>

            </header>


            {{-- =====================================================
                 VALIDATION ERRORS
                 ===================================================== --}}

            @if ($errors->any())

                <div class="post-edit-error">

                    <div class="post-edit-error-title">
                        Please fix the following errors:
                    </div>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            {{-- =====================================================
                 EDIT CARD
                 ===================================================== --}}

            <div class="post-edit-card">

                {{-- CARD HEADER --}}

                <div class="post-edit-card-header">

                    <div class="post-edit-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="post-edit-user">

                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            Editing your portfolio post
                        </span>

                    </div>

                </div>


                {{-- =================================================
                     FORM
                     ================================================= --}}

                <form
                    action="{{ route('posts.update', $post) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="post-edit-form"
                >

                    @csrf
                    @method('PUT')


                    {{-- TITLE --}}

                    <div class="post-edit-field">

                        <label for="title">
                            Post Title
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $post->title) }}"
                            placeholder="Enter post title"
                            required
                        >

                        @error('title')
                            <p class="post-edit-field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- TYPE --}}

                    <div class="post-edit-field">

                        <label for="type">
                            Post Type
                        </label>

                        <select
                            id="type"
                            name="type"
                            required
                        >

                            <option
                                value="text"
                                {{ old('type', $post->type) === 'text' ? 'selected' : '' }}
                            >
                                Text
                            </option>

                            <option
                                value="image"
                                {{ old('type', $post->type) === 'image' ? 'selected' : '' }}
                            >
                                Image
                            </option>

                            <option
                                value="video"
                                {{ old('type', $post->type) === 'video' ? 'selected' : '' }}
                            >
                                Video
                            </option>

                        </select>

                        @error('type')
                            <p class="post-edit-field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- CONTENT --}}

                    <div class="post-edit-field">

                        <label for="content">
                            Content
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            rows="7"
                            placeholder="Write something about your post..."
                        >{{ old('content', $post->content) }}</textarea>

                        @error('content')
                            <p class="post-edit-field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- =================================================
                         CURRENT MEDIA
                         ================================================= --}}

                    @if($post->media_path)

                        <div class="post-edit-current">

                            <div class="post-edit-section-title">
                                Current Media
                            </div>

                            @if($post->type === 'image')

                                <div class="post-edit-current-media">

                                    <img
                                        src="{{ asset('storage/' . $post->media_path) }}"
                                        alt="{{ $post->title }}"
                                    >

                                </div>

                            @elseif($post->type === 'video')

                                <div class="post-edit-current-media">

                                    <video
                                        controls
                                        preload="metadata"
                                        @if($post->thumbnail_path)
                                            poster="{{ asset('storage/' . $post->thumbnail_path) }}"
                                        @endif
                                    >
                                        <source
                                            src="{{ asset('storage/' . $post->media_path) }}"
                                            type="video/mp4"
                                        >

                                        Your browser does not support video playback.

                                    </video>

                                </div>

                            @endif

                        </div>

                    @endif


                    {{-- =================================================
                         NEW MEDIA
                         ================================================= --}}

                    <div class="post-edit-field">

                        <label for="media">
                            Replace Media
                        </label>

                        <input
                            id="media"
                            type="file"
                            name="media"
                            accept="image/*,video/*"
                        >

                        <p class="post-edit-help">
                            Leave this empty if you want to keep the current media.
                        </p>

                        @error('media')
                            <p class="post-edit-field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- =================================================
                         THUMBNAIL
                         ================================================= --}}

                    <div
                        class="post-edit-field"
                        id="thumbnail-field"
                    >

                        <label for="thumbnail">
                            Replace Video Thumbnail
                        </label>

                        <input
                            id="thumbnail"
                            type="file"
                            name="thumbnail"
                            accept="image/*"
                        >

                        <p class="post-edit-help">
                            Optional. Only needed for video posts.
                        </p>

                        @error('thumbnail')
                            <p class="post-edit-field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- =================================================
                         PUBLISH
                         ================================================= --}}

                    <div class="post-edit-publish">

                        <div>

                            <strong>
                                Publish Post
                            </strong>

                            <span>
                                Published posts are visible on your portfolio.
                            </span>

                        </div>

                        <label class="post-edit-toggle">

                            <input
                                type="checkbox"
                                name="is_published"
                                value="1"
                                {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                            >

                            <span class="post-edit-slider"></span>

                        </label>

                    </div>


                    {{-- =================================================
                         FORM ACTIONS
                         ================================================= --}}

                    <div class="post-edit-form-actions">

                        <a
                            href="{{ route('posts.index') }}"
                            class="post-edit-cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="post-edit-submit"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
