<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
 use Illuminate\Database\Eloquent\Casts\Attribute;
 use Spatie\MediaLibrary\HasMedia;
 use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Task extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = ['id'];
    protected $appends = [
        'mediaFile'
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'is_completed' => 'boolean',
        ];
    }

    public function getMediaFileAttribute(): ?Media
     {
         if ($this->relationLoaded('media')) {
             return $this->getFirstMedia();
         }

         return null;
     }
}
