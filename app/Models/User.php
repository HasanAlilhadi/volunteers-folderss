<?php

namespace App\Models;

use App\Models\Organization;
use App\Traits\GlobalFiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GlobalFiltersTrait;

    protected $fillable = ['name', 'username', 'password', 'type', 'organization_id'];

    protected $params = [
        'name' => ['eq'],
        'username' => ['eq'],
        'type' => ['eq', 'ne'],
    ];

    protected $loadableRelations = [
        'organizations',
        'permissions',
    ];

    protected $columns = [];

    // Get Organizations That Each Uesr Created
    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class, 'created_by', 'id');
    }

    // Get Permissions Of Each User
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id');
    }
}
