<?php

namespace App\Models\Album;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use Sluggable;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = array('name','slug','is_featured',
    'is_published');

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }
}
