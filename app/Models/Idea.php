<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    protected $fillable = [
        'description',
        'project_id',
        'date_added',
    ];

    protected $casts = [
        'date_added' => 'date',
    ];

    public $timestamps = false;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
