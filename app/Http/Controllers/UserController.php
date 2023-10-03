<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproveVolunteerRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Approve;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\User;
use App\Models\Volunteer;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return $this->ResponseSuccess(UserResource::collection(User::withRelations()->filter()->get()), 'success', 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return $this->ResponseSuccess(new UserResource($user->withLoads()), 'success', 200);
        }

        return $this->ResponseError('No User With Id ' . $id, 404);
    }

    public function store(StoreUserRequest $request)
    {
        $request['password'] = bcrypt($request['password']);

        return $this->ResponseSuccess(new UserResource(User::create($request->validated())), 'success', 201);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request->validated());
        $user->update($request->validated());

        return $this->ResponseSuccess(new UserResource($user), 'success', 200);
    }

    // Delete all organizations that belong to user with $id
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->ResponseError('User not found', 404);
        }

        $organizations = Organization::where('created_by', $id)->get();
        $userResource = new UserResource($user);

        $user->delete();

        foreach ($organizations as $organization) {
            $organization->delete();
        }

        return $this->ResponseSuccess($userResource, 'success', 200);
    }

    // Add/Delete permission for users
    public function updatePermissions(StorePermissionRequest $request, $id)
    {
        $user = User::find($id)->first();

        if ($user) {
            $permissionsKey = array_unique($request->permissions);

            $permissions = [];

            foreach ($permissionsKey as $key) {
                $permissions[] = Permission::where('key', $key)->first()->id;
            }

            $user->permissions()->sync($permissions);

            $result = [];

            foreach ($permissions as $permission) {
                $result[] = Permission::find($permission)->name;
            }

            return $this->ResponseSuccess($result);
        } else {
            return $this->ResponseError('User with ID ' . $id . ' does not exist', 404);
        }
    }

    public function approveVolunteer(ApproveVolunteerRequest $request, $id)
    {
        $volunteer = Volunteer::find($id);
        if (!$volunteer) {
            return $this->ResponseError('Volunteer with ID ' . $id . ' does not exist', 404);
        }

        $approve = Approve::create([
            'volunteer_id' => $id,
            'created_by' => 1,
            'status' => $request->validated('status'),
        ]);

        $volunteer->update([
            'approve_id' => $approve->id,
        ]);
    }
}
