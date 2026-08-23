<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display all posts in admin.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a new post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            'type' => [
                'required',
                'in:text,image,video',
            ],

            'media' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,mp4,webm',
                'max:51200',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],
        ]);

        $mediaPath = null;
        $thumbnailPath = null;

        /*
        |--------------------------------------------------------------------------
        | Upload media
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('media')) {
            $mediaPath = $request
                ->file('media')
                ->store('posts/media', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Upload thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request
                ->file('thumbnail')
                ->store('posts/thumbnails', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create post
        |--------------------------------------------------------------------------
        */

        Post::create([
            'user_id' => auth()->id(),

            'title' => $validated['title'],

            'slug' => Str::slug($validated['title'])
                . '-' . Str::lower(Str::random(8)),

            'content' => $validated['content'] ?? null,

            'type' => $validated['type'],

            'media_path' => $mediaPath,

            'thumbnail_path' => $thumbnailPath,

            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update post.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            'type' => [
                'required',
                'in:text,image,video',
            ],

            'media' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,mp4,webm',
                'max:51200',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Replace media
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('media')) {

            if ($post->media_path) {
                Storage::disk('public')->delete($post->media_path);
            }

            $post->media_path = $request
                ->file('media')
                ->store('posts/media', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Replace thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            if ($post->thumbnail_path) {
                Storage::disk('public')->delete($post->thumbnail_path);
            }

            $post->thumbnail_path = $request
                ->file('thumbnail')
                ->store('posts/thumbnails', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update fields
        |--------------------------------------------------------------------------
        */

        $post->title = $validated['title'];

        $post->content = $validated['content'] ?? null;

        $post->type = $validated['type'];

        $post->is_published = $request->boolean('is_published');

        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Delete post.
     */
    public function destroy(Post $post)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete uploaded files
        |--------------------------------------------------------------------------
        */

        if ($post->media_path) {
            Storage::disk('public')->delete($post->media_path);
        }

        if ($post->thumbnail_path) {
            Storage::disk('public')->delete($post->thumbnail_path);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
