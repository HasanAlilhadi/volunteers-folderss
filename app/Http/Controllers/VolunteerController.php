<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolunteerRequest;
use App\Http\Requests\UpdateVolunteerRequest;
use App\Http\Resources\VolunteerResource;
use App\Models\Volunteer;
use App\Traits\ResponseTrait;

class VolunteerController extends Controller
{

    use ResponseTrait;

    public function index()
    {
        // needs authentication
        // $query = Volunteer::query();
        // if ($user->organization_id) {
        //     $query->where('organization_id', '=', $user->organization_id);
        // } else if ($request->has('organization_id')) {
        //     $query->where('organization_id', '=', $request->get('organization_id'));
        // }

        // this one too
        // return $this->ResponseSuccess(VolunteerResource::collection($query->withRelations()->filter()->get()));
        return $this->ResponseSuccess(VolunteerResource::collection(Volunteer::withRelations()->filter()->get()));
    }

    public function show($id)
    {
        $volunteer = Volunteer::find($id);

        if ($volunteer) {

            return $this->ResponseSuccess(new VolunteerResource($volunteer->withLoads()), 'success', 200);
        }

        return $this->ResponseError('No Volunteer With Id ' . $id, 404);
    }

    public function store(StoreVolunteerRequest $request)
    {
        return $this->ResponseSuccess(new VolunteerResource(Volunteer::create($request->validated())));
    }

    public function update(UpdateVolunteerRequest $request, Volunteer $volunteer)
    {
        $volunteer->update($request->validated());

        return $this->ResponseSuccess(new VolunteerResource($volunteer), 'success', 200);
    }

    public function delete($id)
    {
        $volunteer = Volunteer::find($id);

        if (!$volunteer) {
            return $this->ResponseError('Volunteer not found', 404);
        }

        $volunteerResource = new VolunteerResource($volunteer);

        $volunteer->delete();

        return $this->ResponseSuccess($volunteerResource, 'success', 200);
    }

}
