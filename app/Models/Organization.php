<?php

namespace App\Models;

use App\Models\User;
use App\Traits\GlobalFiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GlobalFiltersTrait;

    protected $fillable = ['name', 'code', 'created_by'];

    protected $params = [
        'name' => ['eq'],
        'created_by' => ['eq'],
    ];

    protected $loadableRelations = [
        'user',
        'volunteers',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function volunteers(): HasMany
    {
        return $this->hasMany(Volunteer::class);
    }
}
