<?php

namespace App\Models;

use App\Models\User;
use App\Traits\GlobalFiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;
    use GlobalFiltersTrait;

    public $timestamps = false;

    protected $fillable = ['name'];

    protected $params = [
        'group' => ['eq', 'ne'],
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }
}
