<?php

namespace App\Http\Controllers;


use App\Events\UserCreated;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @group User Management
 *
 * APIs to manage the user resource.
 * */
class UserController extends Controller
{

    public function index(Request $request)
    {

        $users = User::query()->paginate(20);

        return UserResource::collection($users);
    }

    public function store(Request $request, UserRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
            'email',
        ]));
        return new UserResource($created);
    }


    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user, UserRepository $repository)
    {
        $user = $repository->update($user, $request->only([
            'name',
            'email',
        ]));

        return new UserResource($user);
    }

    public function destroy(User $user, UserRepository $repository)
    {
        $deleted = $repository->forceDelete($user);
        return new \Illuminate\Http\JsonResponse([
            'data' => 'success',
        ]);
    }
}
