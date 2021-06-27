<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Timeline\Timeline;
use App\Http\Requests\Timeline\TimelineRequest;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $timeline;

    function __construct(Timeline $timeline)
    {
        $this->timeline = $timeline;
    }
    public function index()
    {
        $timeline = $this->timeline->orderBy('created_at', 'desc')->get();

        return view('backend.timeline.index', compact('timeline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.timeline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimelineRequest $request)
    {
        if($timeline = $this->timeline->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $timeline);
            }
            return redirect()->route('timeline.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeline $timeline)
    {
        return view('backend.timeline.edit', compact('timeline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimelineRequest $request, Timeline $timeline)
    {
        if ($timeline->update($request->data())) {
            $timeline->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $timeline);
            }
        }
        return redirect()->route('timeline.index')->withSuccess(trans('timeline has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeline = $this->timeline->find($id);
        $timeline->delete();
        return redirect()->route('timeline.index')->withSuccess(trans('timeline has been deleted'));
    }

    function uploadFile(Request $request, $timeline)
    {
        $file = $request->file('image');
        $path = 'uploads/timeline';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($timeline->image))
            $this->__deleteImages($timeline);

        $data['image'] = $fileName;
        $this->updateImage($timeline->id, $data);

    }

    public function updateImage($timelineId, array $data)
    {
        try {
            $timeline = $this->timeline->find($timelineId);
            $timeline = $timeline->update($data);
            return $timeline;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
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
}
