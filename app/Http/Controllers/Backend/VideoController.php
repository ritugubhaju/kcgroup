<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video\Video;
use App\Http\Requests\Video\StoreVideo;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $video;

    function __construct(Video $video)
    {
        $this->video = $video;

    }
    public function index()
    {
        $video = $this->video->orderBy('created_at', 'desc')->get();
        return view('backend.video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideo $request)
    {
        //dd($request->all());
        if ($video = $this->video->create($request->data())) {
            if ($request->hasFile('video')) {
                $this->uploadFile($request, $video);
            }
        }

        return redirect()->route('video.index')->withSuccess(trans('New video has been created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('backend.video.edit', compact('video'));
    }

    public function update(StoreVideo $request, Video $video)
    {
        //dd($request->all());
        if ($video->update($request->data())) {
            //dd($video);
           
            if ($request->hasFile('video')) {
                $this->uploadFile($request, $video);
            }
        }

        return redirect()->route('video.index')->withSuccess(trans('video has been updated'));
    }

    public function destroy($id)
    {
      
       $video = Video::find($id);
       $video->delete();
       return redirect()->route('video.index')->withSuccess(trans('video has been deleted'));


    }

    function uploadFile(Request $request, $video)
    {
        $file = $request->file('video');
        $path = 'uploads/video';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($video->video))
            $this->__deletevideos($video);

        $data['video'] = $fileName;
        $this->updatevideo($video->id, $data);

    }
    public function __deletevideos($subCat)
    {
        try {
            if (is_file($subCat->video_path))
                unlink($subCat->video_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }

    public function updatevideo($videoId, array $data)
    {
        try {
            $video = Video::find($videoId);
            $video = $video->update($data);
            return $video;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
