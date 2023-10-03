<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use App\Models\User;
use App\Models\Volunteer;
use App\Traits\ResponseTrait;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return $this->ResponseSuccess(OrganizationResource::collection(Organization::withRelations()->filter()->get()), 'success', 200);
    }

    public function show($id)
    {
        $organization = Organization::find($id);

        if ($organization) {
            return $this->ResponseSuccess(new OrganizationResource($organization->withLoads()), 'success', 200);
        }

        return $this->ResponseError('Organization not found with Id ' . $id);
    }

    public function store(StoreOrganizationRequest $request)
    {
        // Change when you add authentication
        $userId = $request->validated('created_by');
        if (User::find($userId)->organization_id != null) {
            return $this->ResponseError('You are not allowed to created organizations');
        }

        $organization = new OrganizationResource(Organization::create($request->validated()));

        $user = User::create([
            'name' => 'New User',
            'username' => 'user_' . $organization->id,
            'password' => bcrypt(Str::random()),
            'organization_id' => $organization->id,
        ]);

        $user->permissions()->sync([1, 2, 3, 4, 5, 6, 7]);

        return $this->ResponseSuccess($organization);
    }

    public function update(UpdateOrganizationRequest $request, Organization $id)
    {
        $id->update($request->validated());

        return $this->ResponseSuccess(new OrganizationResource($id), 'success', 200);
    }

    public function delete($id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return $this->ResponseError('Organization not found', 404);
        }

        if (Volunteer::where('organization_id', $id)->where('approve_id', 1)->count() > 0) {
            return $this->ResponseError('Organization has Volunteers', 404);
        }

        $organizationResource = new OrganizationResource($organization);

        $organization->delete();

        return $this->ResponseSuccess($organizationResource, 'success', 200);
    }
}
