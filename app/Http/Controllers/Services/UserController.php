<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Response;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
     public function index()
    {
        $users = $this->userRepository->paginate(trans('user.limit'));

        if (!$users) {
            return Response::json([
                'message' => 'User not found',
                'status' => false,
            ]);
        } else {
            return Response::json([
                'message' => 'success',
                'data' => $users,
                'status' => true,
            ]);
        }
    }

    public function store(Request $request)
    {
        $input = $request->only('user_access_level', 'name', 'email', 'password', 'city', 'avatar', 'gender', 'phone_number', 'address');

        if ($this->userRepository->create($input)) { 
            return response()->json([
                'message' => 'success',
                'status' => true,
            ]);
        } else {
            return response()->json([
                'message' => 'User not found',
                'status' => false,
            ]);
        }
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if ($user) { 
            return response()->json([
                'message' => 'success',
                'status' => true,
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'User item not found',
                'status' => false,
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $user = $this->userRepository->find($id);
        if ($user) { 
            $input = $request->only('user_access_level', 'name', 'email', 'password', 'city', 'avatar', 'gender', 'phone_number', 'address');
            $user = $this->userRepository->update($input, $id);

            return response()->json([
                'message' => 'success',
                'status' => true,
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'User not found',
                'status' => false,
            ]);
        }
    }
}
