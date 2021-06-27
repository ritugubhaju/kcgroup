<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sector\Sector;
use Cviebrock\EloquentSluggable\Sluggable;

class Client extends Model
{
    use Sluggable;

    protected $path ='uploads/client';
    protected $company_path = 'uploads/company_image';

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
        'sector_id',
        'content',
        'image',
        'company_image',
        'position',
        'company',
        'is_featured',
        'is_published'
    ];

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
       'thumbnail_path', 'image_path' , 'company_path'
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

    function getCompanyPathAttribute()
    {
        return $this->company_path . '/' . $this->company_image;
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class,'sector_id');
    }
}
