<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Http\Requests\Event\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $event;

    function __construct(Event $event)
    {
        $this->event = $event;
    }
    public function index()
    {
        $event = $this->event->orderBy('created_at', 'desc')->get();

        return view('backend.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
       // dd($request->all());
        if($event = $this->event->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $event);
            }
            return redirect()->route('event.index');

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
    public function edit(Event $event)
    {
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        // dd($request->all());
        if ($event->update($request->data())) {
            $event->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $event);
            }
        }
        return redirect()->route('event.index')->withSuccess(trans('Event has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = $this->event->find($id);
        $event->delete();
        return redirect()->route('event.index')->withSuccess(trans('Event has been deleted'));
    }   

    function uploadFile(Request $request, $event)
    {
        $file = $request->file('image');
        $path = 'uploads/event';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($event->image))
            $this->__deleteImages($event);

        $data['image'] = $fileName;
        $this->updateImage($event->id, $data);

    }

    public function updateImage($eventId, array $data)
    {
        try {
            $event = $this->event->find($eventId);
            $event = $event->update($data);
            return $event;
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
