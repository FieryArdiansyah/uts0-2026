<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $table = 'project_progress';

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'progress_percentage',
        'status',
        'progress_date',
    ];

    protected $casts = [
        'progress_percentage' => 'integer',
        'progress_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (ProjectProgress $progress) {
            if (blank($progress->progress_date)) {
                $progress->progress_date = now()->toDateString();
            }

            if (blank($progress->status)) {
                $progress->status = 'proposal';
            }
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}