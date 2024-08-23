<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Http\Requests\PostReaquest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use App\Rules\IntergerArray;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::query()->paginate(20);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PostRepository $repository)
    {
        $data = $request->only([
            'title',
            'body',
            'user_ids',
        ]);
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'body' => ['required', 'string'],
            'user_ids' => ['required', 'array', new IntergerArray(), 'exists:users,id'],
        ])->validate();;

        $created = $repository->create($validator);
        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!$post) {
            return new JsonResponse([
                'message' => "not found"
            ]);
        }
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, PostRepository $repository)
    {
        $updated = $repository->update($post, $request->all());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, PostRepository $repository)
    {
        return $repository->delete($post);
    }
}
