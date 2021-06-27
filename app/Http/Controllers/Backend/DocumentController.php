<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Document\Document;
use App\Models\Sector\Sector;
use App\Http\Requests\Document\StoreDocument;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $document, $sector;

    function __construct(Document $document, Sector $sector)
    {
        $this->document = $document;
        $this->sector = $sector;

    }

    public function index()
    {
        
        $document = $this->document->orderBy('created_at', 'desc')->get();
        return view('backend.document.index', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sectors = $this->sector->get();
        return view('backend.document.create',compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocument $request)
    {
            //dd($request->all());
            if ($document = $this->document->create($request->data())) {
                if ($request->hasFile('document')) {
                    $this->uploadFile($request, $document);
                }
            }

        return redirect()->route('document.index')->withSuccess(trans('New document has been created'));
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
    public function edit(Document $document)
    {
        //
        $sector_search = Sector::find($document->sector_id);
        $sectors = $this->sector->get();
        // dd($gallery->sector()->get('name'));
        return view('backend.document.edit', compact('document','sectors','sector_search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDocument $request, Document $document)
    {
        //
        if ($document->update($request->data())) {
            $document->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('document')) {
                $this->uploadFile($request, $document);
            }
        }
        return redirect()->route('document.index')->withSuccess(trans('Document has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = $this->document->find($id);
        $document->delete();
        return redirect()->route('document.index')->withSuccess(trans('document has been deleted'));
    }
    function uploadFile(Request $request, $document)
    {
        $file = $request->file('document');
        $path = 'uploads/document';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($document->document))
            $this->__deleteImages($document);

        $data['document'] = $fileName;
        $this->updateImage($document->id, $data);

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

    public function updateImage($documentId, array $data)
    {
        try {
            $document = Document::find($documentId);
            $document = $document->update($data);
            return $document;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
