<?php

namespace App\Models\Sector;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Sector extends Model
{
    use Sluggable;

    protected $path ='uploads/sector';
    protected $icon_path = 'uploads/icon_image';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
      
        'slug',
        'title',
        'content',
        'image',
        'icon_image',
        'is_featured',
        'is_published'
    ];

    public function excerpt()
    {
        return Str::limit($this->content, Sector::EXCERPT_LENGTH);
    }

    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */

//    protected $dates = ['date'];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $appends = [
       'thumbnail_path', 'image_path','icon_path'
    ];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    function getImagePathAttribute(){
        return $this->path.'/'. $this->image;
    }

    function getThumbnailPathAttribute(){
        return $this->path.'/thumb/'. $this->image;
    }

    function getIconPathAttribute()
    {
        return $this->icon_path . '/' . $this->icon_image;
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}

