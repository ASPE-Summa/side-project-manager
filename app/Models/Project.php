<?php

namespace App\Models;

use App\Enum\ProjectStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'repository',
        'start_date',
        'last_updated',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'last_updated' => 'date',
        'status' => ProjectStatus::class,
    ];

    public $timestamps = false;

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }
}
