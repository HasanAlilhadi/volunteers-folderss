<?php

namespace App\Models;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approve extends Model
{
    use HasFactory;

    protected $fillable = ['volunteer_id', 'status', 'created_by'];

    public $timestamps = false;

    public function volunteer(): BelongsTo
    {
        return $this->BelongsTo(Volunteer::class);
    }
}
