<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'problem_analysis',
        'system_requirements',
        'tech_stack',
        'diagram_image',
        'status',
        'is_final_project',
    ];

    protected $casts = [
        'is_final_project' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project): void {
            $source = filled($project->slug)
                ? $project->slug
                : $project->title;

            $project->slug = self::generateUniqueSlug($source);
        });

        static::updating(function (Project $project): void {
            if ($project->isDirty('slug')) {
                $source = filled($project->slug)
                    ? $project->slug
                    : $project->title;

                $project->slug = self::generateUniqueSlug($source, $project->id);
            }
        });
    }

    public function progresses(): HasMany
    {
        return $this->hasMany(ProjectProgress::class)
            ->latest('progress_date')
            ->latest('id');
    }

    public function latestProgress(): HasOne
    {
        return $this->hasOne(ProjectProgress::class)
            ->latestOfMany('progress_date');
    }

    public function scopeFinalProject(Builder $query): Builder
    {
        return $query->where('is_final_project', true);
    }

    public function scopeLatestProject(Builder $query): Builder
    {
        return $query->latest('created_at');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getTechStackItemsAttribute(): array
    {
        if (blank($this->tech_stack)) {
            return [];
        }

        return collect(explode(',', $this->tech_stack))
            ->map(fn (string $item): string => trim($item))
            ->filter()
            ->values()
            ->toArray();
    }

    public function getProgressPercentageAttribute(): int
    {
        return (int) ($this->latestProgress?->progress_percentage ?? 0);
    }

    public function getDiagramImageUrlAttribute(): ?string
    {
        if (blank($this->diagram_image)) {
            return null;
        }

        return asset('storage/' . $this->diagram_image);
    }

    protected static function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($value);

        if (blank($baseSlug)) {
            $baseSlug = 'project';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            static::query()
                ->when($ignoreId, fn (Builder $query) => $query->whereKeyNot($ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}