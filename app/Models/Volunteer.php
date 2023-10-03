<?php

namespace App\Models;

use App\Models\Organization;
use App\Traits\GlobalFiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Volunteer extends Model
{
    use HasFactory;
    use GlobalFiltersTrait;

    protected $fillable = [
        'organization_id',
        'approve_id',
        'job_termination_id',
        'first_name',
        'second_name',
        'third_name',
        'forth_name',
        'nickname',
        'mother_first_name',
        'mother_second_name',
        'mother_third_name',
        'birthdate',
        'birthplace',
        'father_birthdate',
        'father_birthplace',
        'city',
        'district',
        'nahiya',
        'mahala',
        'zuqaq',
        'house_number',
        'nearest_point',
        'academic_achivement',
        'is_married',
        'national_id_number',
        'have_volunteered',
        'previous_location',
        'belong_to_political_movement',
        'occupation',
        'phone_number',
        'languages',
        'code_number',
        'special_needs',
        'diseases',
    ];

    protected $params = [
        'first_name' => ['eq'],
    ];

    protected $loadableRelations = [
        'organization',
    ];
    protected $casts = [
        'languages' => 'array',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function approves(): HasMany
    {
        return $this->hasMany(Approve::class);
    }
}
