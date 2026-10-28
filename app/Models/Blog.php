<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'text',
        'img1',
        'img2',
        'img3',
        'social_url',
    ];

    protected $appends = [
        'primary_image',
        'primary_image_url',
        'image_urls',
    ];

    public function getImgAttribute($value): ?string
    {
        return $value ?: $this->primary_image;
    }

    public function getPrimaryImageAttribute(): ?string
    {
        return $this->existingImageNames()[0] ?? null;
    }

    public function getPrimaryImageUrlAttribute(): ?string
    {
        return $this->primary_image ? asset('uploads/' . $this->primary_image) : null;
    }

    public function getImageUrlsAttribute(): array
    {
        return collect($this->existingImageNames())
            ->map(fn ($image) => asset('uploads/' . $image))
            ->values()
            ->all();
    }

    private function existingImageNames(): array
    {
        return collect([
            $this->attributes['img1'] ?? null,
            $this->attributes['img2'] ?? null,
            $this->attributes['img3'] ?? null,
        ])
            ->filter(fn ($image) => is_string($image) && trim($image) !== '')
            ->unique()
            ->filter(fn ($image) => File::exists(public_path('uploads/' . $image)))
            ->values()
            ->all();
    }
}
