<x-app-layout>

    <div class="posts-page">

        <div class="posts-container">

            {{-- PAGE HEADER --}}
            <header class="posts-header">

                <div class="posts-header-content">
                    <span class="posts-eyebrow">
                        CONTENT MANAGEMENT
                    </span>

                    <h1 class="posts-title">
                        Posts
                    </h1>

                    <p class="posts-description">
                        Manage your portfolio content, images, and videos.
                    </p>
                </div>

                {{-- HEADER ACTIONS --}}
                <div class="posts-header-actions">

                    {{-- BACK TO DASHBOARD --}}
                    <a
                        href="{{ route('dashboard') }}"
                        class="posts-dashboard-button"
                    >
                        <span class="posts-dashboard-icon">←</span>
                        <span>Dashboard</span>
                    </a>

                    {{-- CREATE POST --}}
                    <a
                        href="{{ route('posts.create') }}"
                        class="posts-create-button"
                    >
                        <span class="posts-create-icon">+</span>
                        <span>Create Post</span>
                    </a>

                </div>

            </header>


            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div class="posts-alert">

                    <span class="posts-alert-icon">
                        ✓
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- FEED --}}
            <main class="posts-feed">

                @forelse($posts as $post)

                    <article class="post-card">

                        {{-- POST TOP --}}
                        <div class="post-card-top">

                            <div class="post-user">

                                <div class="post-avatar">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>

                                <div class="post-user-info">

                                    <h2 class="post-title">
                                        {{ $post->title }}
                                    </h2>

                                    <div class="post-meta">

                                        <span>
                                            {{ $post->created_at->format('M d, Y') }}
                                        </span>

                                        <span class="post-meta-dot">
                                            •
                                        </span>

                                        <span>
                                            {{ ucfirst($post->type) }}
                                        </span>

                                        @if($post->is_published)

                                            <span class="post-status published">
                                                Published
                                            </span>

                                        @else

                                            <span class="post-status draft">
                                                Draft
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            {{-- ACTIONS --}}
                            <div class="post-actions">

                                <a
                                    href="{{ route('posts.edit', $post) }}"
                                    class="post-action edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('posts.destroy', $post) }}"
                                    method="POST"
                                    class="post-delete-form"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="post-action delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>


                        {{-- TEXT POST --}}
                        @if($post->type === 'text')

                            @if($post->content)

                                <div class="post-content">
                                    {{ $post->content }}
                                </div>

                            @endif


                        {{-- IMAGE POST --}}
                        @elseif($post->type === 'image')

                            @if($post->media_path)

                                <div class="post-media image-media">

                                    <img
                                        src="{{ asset('storage/' . $post->media_path) }}"
                                        alt="{{ $post->title }}"
                                        loading="lazy"
                                    >

                                </div>

                            @endif

                            @if($post->content)

                                <div class="post-content">
                                    {{ $post->content }}
                                </div>

                            @endif


                        {{-- VIDEO POST --}}
                        @elseif($post->type === 'video')

                            @if($post->media_path)

                                <div class="post-media video-media">

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

                            @if($post->content)

                                <div class="post-content">
                                    {{ $post->content }}
                                </div>

                            @endif

                        @endif


                        {{-- POST FOOTER --}}
                        <div class="post-footer">

                            <span>
                                {{ $post->is_published ? 'Visible on portfolio' : 'Saved as draft' }}
                            </span>

                            <span>
                                {{ $post->created_at->diffForHumans() }}
                            </span>

                        </div>

                    </article>

                @empty

                    {{-- EMPTY STATE --}}
                    <div class="posts-empty">

                        <div class="posts-empty-icon">
                            +
                        </div>

                        <h2>
                            No posts yet
                        </h2>

                        <p>
                            Create your first portfolio post to get started.
                        </p>

                        <a
                            href="{{ route('posts.create') }}"
                            class="posts-create-button"
                        >
                            <span class="posts-create-icon">+</span>
                            <span>Create Your First Post</span>
                        </a>

                    </div>

                @endforelse

            </main>


            {{-- PAGINATION --}}
            @if($posts->hasPages())

                <div class="posts-pagination">
                    {{ $posts->links() }}
                </div>

            @endif

        </div>

    </div>

</x-app-layout>
