<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\Users\UsersResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::latest()->get();

        return UsersResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
            'id_number' => $request->id_number,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);

        if($request->services) {
            $user->services()->attach($request->services);
        }

        return new UsersResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'phone' => $request->phone
            // 'password' => bcrypt($request->password)
        ]);

        if($request->services) {
            $user->services()->attach($request->services);
        }

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function delete_single(Request $request, $id)
    {
        $user = User::find($id);

        $user->services()->detach($request->service_id);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
