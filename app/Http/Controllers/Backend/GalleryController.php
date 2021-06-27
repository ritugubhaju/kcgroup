<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery\Gallery;
use App\Models\Album\Album;
use App\Http\Requests\Gallery\StoreGallery;
use App\Http\Requests\Gallery\UpdateGallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    protected $gallery, $album;

    function __construct(Gallery $gallery, Album $album)
    {
        $this->gallery = $gallery;
        $this->album = $album;

    }

    public function index()
    {
        
        $gallery = $this->gallery->orderBy('created_at', 'desc')->get();
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        // $albums = $this->album->get();
        $albums = $this->album->get();
        return view('backend.gallery.create',compact('albums'));
    }

    /**
     * @param StoreGallery $request
     * @return mixed
     */
    public function store(StoreGallery $request)
    {
        //dd($request->data());
        if ($gallery = $this->gallery->create($request->data())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $gallery);
            }
        }

        return redirect()->route('gallery.index')->withSuccess(trans('New Gallery has been created'));
    }

    /**
     * @param Gallery $gallery
     * @return \Illuminate\View\View
     */
    public function edit(Gallery $gallery)
    {
        $album_search = Album::find($gallery->album_id);
        $albums = $this->album->get();
        return view('backend.gallery.edit', compact('gallery','albums','album_search'));
    }

    public function update(StoreGallery $request, Gallery $gallery)
    {
       // dd($request->all());
        if ($gallery->update($request->data())) {
            $gallery->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $gallery);
            }
        }

        return redirect()->route('gallery.index')->withSuccess(trans('Gallery has been updated'));
    }

    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $gallery->delete();
        return redirect()->route('gallery.index')->withSuccess(trans('gallery has been deleted'));
    }
    function uploadFile(Request $request, $gallery)
    {
        $file = $request->file('image');
        $path = 'uploads/gallery';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($gallery->image))
            $this->__deleteImages($gallery);

        $data['image'] = $fileName;
        $this->updateImage($gallery->id, $data);

    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }

    public function updateImage($galleryId, array $data)
    {
        try {
            $gallery = $this->gallery->find($galleryId);
            $gallery = $gallery->update($data);
            return $gallery;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}

