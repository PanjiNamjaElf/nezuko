<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @package   Nezuko - Content Management System
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(20);

        return view('post.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $post = new Post();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified post.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('post.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        abort_unless($post->user_id == auth()->id(), 403);

        return view('post.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->id()) {
            $post->delete();
        }

        return response()->noContent();
    }
}
