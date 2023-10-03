<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Traits\ResponseTrait;

class PermissionController extends Controller
{

    use ResponseTrait;

    public function index()
    {
        return $this->ResponseSuccess(Permission::filter()->get());
    }
}
