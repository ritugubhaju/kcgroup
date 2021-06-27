<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector\Sector;
use App\Http\Requests\Sector\SectorRequest;
use Illuminate\Support\Str;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sector;

    function __construct(Sector $sector)
    {
        $this->sector = $sector;
    }
    public function index()
    {
        $sector = $this->sector->orderBy('created_at', 'desc')->get();

        return view('backend.sector.index', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request)
    {
       // dd($request->all());
        if($sector = $this->sector->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $sector,'image');
            }

            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $sector, 'icon_image');
            }
            return redirect()->route('sector.index');

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
    public function edit(Sector $sector)
    {
      
        return view('backend.sector.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request, Sector $sector)
    {
       
        if ($sector->update($request->data())) {
            $sector->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $sector,'image');
            }

            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $sector, 'icon_image');
            }
            
        }
        return redirect()->route('sector.index')->withSuccess(trans('sector has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = $this->sector->find($id);
        $sector->delete();
        return redirect()->route('sector.index')->withSuccess(trans('sector has been deleted'));
    }   

    function uploadFile(Request $request, $sector, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/sector';
            $fileName = $this->uploadFromAjax($file, $path);
           
            $data['image'] = $fileName;
        }
        if ($type == 'icon_image') {
            $file = $request->file('icon_image');
            $path = 'uploads/icon_image';
            $fileName = $this->uploadFromAjax($file, $path);
           

            $data['icon_image'] = $fileName;
        }

        $this->updateImage($sector->id, $data);

    }

    public function updateImage($sectorId, array $data)
    {
        try {
            $sector = $this->sector->find($sectorId);
            $sector = $sector->update($data);
            return $sector;
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

            if (is_file($subCat->icon_path))
            unlink($subCat->icon_path);
        } catch (\Exception $e) {

        }
    }
}
