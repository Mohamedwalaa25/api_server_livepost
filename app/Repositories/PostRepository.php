<?php

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PostRepository implements BaseRepository
{
    public function create(array $attributes)
    {

        return DB::transaction(function () use ($attributes) {
            $created = Post::create([
                'title' => data_get($attributes, 'title', 'Untitled'),
                'body' => data_get($attributes, 'body', 'No content'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create model.');
            $created->users()->sync($attributes['user_ids']);
            return $created;
        });
    }

    public function update($post, array $attributes)
    {
        $updated = $post->update([
            'title' => data_get($attributes, 'title', 'Untitled'),
            'body' => data_get($attributes, 'body', 'No content'),
        ]);
        throw_if(!$updated, GeneralJsonException::class, 'Failed to create model.');
        $post->users()->sync($attributes['user_ids']);

        return $updated;
    }

    public function delete( $post)
    {
        $deleted = $post->delete();
        throw_if(!$deleted, GeneralJsonException::class, 'Failed to create model.');

        return new JsonResponse([
            "message" => "deleted",
        ]);
    }

}
