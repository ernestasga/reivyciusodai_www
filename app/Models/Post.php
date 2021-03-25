<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements HasMedia, Searchable
{
    use InteractsWithMedia;
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'content'
    ];

    public function getSearchResult(): SearchResult
    {
       $url = route('visitor.post.show', $this->slug);

        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->name,
           $url
        );
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->sharpen(10);

              $this->addMediaConversion('compressed')
              ->width(800)
              ->sharpen(2);
    }
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
