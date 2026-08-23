<x-app-layout>

    <div class="post-create-page">

        <div class="post-create-wrapper">

            <div class="post-create-topbar">

                <div>
                    <p class="posts-eyebrow">
                        Content Management
                    </p>

                    <h1 class="post-create-title">
                        Create Post
                    </h1>

                    <p class="post-create-subtitle">
                        Create a text, image, or video post for your portfolio.
                    </p>
                </div>

                <a
                    href="{{ route('posts.index') }}"
                    class="post-back-button"
                >
                    ← Back to Posts
                </a>

            </div>


            @if ($errors->any())

                <div class="post-error-box">

                    <div class="post-error-title">
                        Please fix the following:
                    </div>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <div class="post-composer">

                <div class="composer-header">

                    <div class="composer-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="composer-user">
                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            Create a new post
                        </span>
                    </div>

                </div>


                <form
                    action="{{ route('posts.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="post-composer-form"
                    id="postCreateForm"
                >

                    @csrf

                    <div class="composer-field">

                        <label for="title">
                            Post Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Give your post a title..."
                            required
                        >

                        @error('title')
                            <p class="post-form-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- TYPE --}}

                    <div class="composer-type">

                        <button
                            type="button"
                            class="type-option active"
                            data-type="text"
                        >
                            <span>✎</span>
                            Text
                        </button>

                        <button
                            type="button"
                            class="type-option"
                            data-type="image"
                        >
                            <span>▧</span>
                            Image
                        </button>

                        <button
                            type="button"
                            class="type-option"
                            data-type="video"
                        >
                            <span>▶</span>
                            Video
                        </button>

                    </div>

                    <input
                        type="hidden"
                        name="type"
                        id="type"
                        value="{{ old('type', 'text') }}"
                    >


                    {{-- CONTENT --}}

                    <div class="composer-content">

                        <textarea
                            id="content"
                            name="content"
                            placeholder="What's on your mind?"
                        >{{ old('content') }}</textarea>

                        @error('content')
                            <p class="post-form-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- MEDIA --}}

                    <div
                        class="composer-media"
                        id="mediaField"
                    >

                        <label
                            for="media"
                            class="media-upload-box"
                        >

                            <div class="media-upload-icon">
                                +
                            </div>

                            <div class="media-upload-title">
                                Add photo or video
                            </div>

                            <div class="media-upload-description">
                                JPG, PNG, WEBP, MP4 or WEBM · Maximum 50MB
                            </div>

                        </label>

                        <input
                            type="file"
                            id="media"
                            name="media"
                            accept="image/jpeg,image/png,image/webp,video/mp4,video/webm"
                        >

                        <div
                            class="media-preview"
                            id="mediaPreview"
                        ></div>

                        @error('media')
                            <p class="post-form-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- THUMBNAIL --}}

                    <div
                        class="composer-thumbnail"
                        id="thumbnailField"
                    >

                        <label for="thumbnail">
                            Video Thumbnail
                        </label>

                        <input
                            type="file"
                            id="thumbnail"
                            name="thumbnail"
                            accept="image/jpeg,image/png,image/webp"
                        >

                        <p class="post-form-help">
                            Optional. Used as the video preview image.
                        </p>

                        @error('thumbnail')
                            <p class="post-form-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- PUBLISH --}}

                    <div class="composer-publish">

                        <div>
                            <strong>
                                Publish post
                            </strong>

                            <span>
                                Make this post visible immediately.
                            </span>
                        </div>

                        <label class="toggle">

                            <input
                                type="checkbox"
                                name="is_published"
                                value="1"
                                {{ old('is_published') ? 'checked' : '' }}
                            >

                            <span class="toggle-slider"></span>

                        </label>

                    </div>


                    {{-- ACTIONS --}}

                    <div class="composer-actions">

                        <a
                            href="{{ route('posts.index') }}"
                            class="composer-cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="composer-submit"
                        >
                            Create Post
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
