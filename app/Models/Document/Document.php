<?php

namespace App\Models\Document;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sector\Sector;
use Cviebrock\EloquentSluggable\Sluggable;

class Document extends Model
{
    use Sluggable;

    protected $table = 'documents';

    protected $path ='uploads/document';

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'sector_id',
        'document',
        'is_featured',
        'is_published',
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

    protected $appends = [
        'document_path'
    ];

    function getDocumentPathAttribute(){
        return $this->path.'/'. $this->document;
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class,'sector_id');
    }
}
