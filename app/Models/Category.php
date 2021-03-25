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

class Category extends Model implements HasMedia, Searchable
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $fillable = [
        'name',
        'description',
        'icon'
    ];
    protected $nullable = [
        'description',
        'icon'
    ];

    public function getSearchResult(): SearchResult
    {
       $url = route('visitor.category.show', $this->slug);

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

    public function product(){
        return $this->hasMany(Product::class);
    }

}
