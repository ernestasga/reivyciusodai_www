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

class Product extends Model implements HasMedia, Searchable
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'sale_price',
        'stock',
        'popular'
    ];
    protected $nullable = [
        'description',
        'sale_price',
        'stock',
        'popular'
    ];

    public function getSearchResult(): SearchResult
    {
       $url = route('visitor.product.show', $this->slug);

        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->name,
           $url,
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

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
