<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use App\Models\Sector\Sector;
use App\Http\Requests\Client\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client, $sector;

    function __construct(Client $client, Sector $sector)
    {
        $this->client = $client;
        $this->sector = $sector;

    }
    public function index()
    {
        $client = $this->client->orderBy('created_at', 'desc')->get();

        return view('backend.client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = $this->sector->get();
        return view('backend.client.create',compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
       //dd($request->all());
        if($client = $this->client->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $client, 'image');
            }
            if ($request->hasFile('company_image')) {
                $this->uploadFile($request, $client, 'company_image');
            }
            return redirect()->route('client.index');

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
    public function edit(Client $client)
    {
      
        $sector_search = Sector::find($client->sector_id);
        $sectors = $this->sector->get();
        // dd($gallery->sector()->get('name'));
        return view('backend.client.edit', compact('client','sectors','sector_search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, client $client)
    {
        //dd($request->all());
        if ($client->update($request->data())) {
            $client->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $client,'image');
            }

            if ($request->hasFile('company_image')) {
                $this->uploadFile($request, $client, 'company_image');
            }
        }
        return redirect()->route('client.index')->withSuccess(trans('client has been updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->find($id);
        $client->delete();
        return redirect()->route('client.index')->withSuccess(trans('client has been deleted'));
    }   

    function uploadFile(Request $request, $client, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/client';
            $fileName = $this->uploadFromAjax($file, $path);
        

            $data['image'] = $fileName;
        }
        if ($type == 'company_image') {
            $file = $request->file('company_image');
            $path = 'uploads/company_image';
            $fileName = $this->uploadFromAjax($file, $path);
            
            $data['company_image'] = $fileName;
        }

        $this->updateImage($client->id, $data);

    }

    public function updateImage($clientId, array $data)
    {
        try {
            $client = $this->client->find($clientId);
            $client = $client->update($data);
            return $client;
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
            if (is_file($subCat->company_path))
                unlink($subCat->company_path);
        } catch (\Exception $e) {

        }
    }
}
