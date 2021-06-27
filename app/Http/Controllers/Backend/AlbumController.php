<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Album\StoreAlbum;
use App\Models\Album\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $album;

    function __construct(Album $album)
    {
        $this->album = $album;
    }
    public function index()
    {
        $albums = $this->album->orderBy('created_at', 'desc')->get();

        return view('backend.album.index', compact('albums'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.album.create');
    }

    /**
     * @param StoreAlbum $request
     * @return mixed
     */
    public function store(StoreAlbum $request)
    {
//        DB::transaction(function () use ($request)
//        {
//            $album = News::create($request->data());
//
//            $this->uploadRequestImage($request, $album);
//        });
//    dd($request->data());
        if ($album = $this->album->create($request->data())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $album);
            }
        }

        return redirect()->route('album.index')->withSuccess(trans('New News has been created'));
    }

    /**
     * @param Album $page
     * @return \Illuminate\View\View
     */
    public function edit(Album $album)
    {
        return view('backend.album.edit', compact('album'));
    }

    public function update(StoreAlbum $request, Album $album)
    {
        if ($album->update($request->data())) {
            $album->fill([
                'slug' => $request->name,
            ])->save();
            return redirect()->route('album.index')->withSuccess(trans('Album has been updated'));
          
        }

    }

    public function destroy($id)
    {
//        dd($album);
        $album = $this->album->find($id);
        $album->delete();
        return redirect()->route('album.index')->withSuccess(trans('album has been deleted'));
            }


    function uploadFile(Request $request, $album)
    {
        $file = $request->file('image');
        $path = 'uploads/album';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($album->image))
            $this->__deleteImages($album);

        $data['cover_image'] = $fileName;
        $this->updateImage($album->id, $data);

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

    public function updateImage($albumId, array $data)
    {
        try {
            $album = $this->album->find($albumId);
            $album = $album->update($data);
            return $album;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }

}
