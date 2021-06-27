<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Project;
use App\Models\Sector\Sector;
use App\Http\Requests\Project\ProjectRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $project, $sector;

    function __construct(Project $project, Sector $sector)
    {
        $this->project = $project;
        $this->sector = $sector;

    }
    public function index()
    {
        $project = $this->project->orderBy('created_at', 'desc')->get();

        return view('backend.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
      
        $sectors = $this->sector->get();
       
        return view('backend.project.create',compact('sectors','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
       // dd($request->all());
        if($project = $this->project->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $project);
            }
            return redirect()->route('project.index');

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
    public function edit(Project $project)
    {
      
        $sector_search = Sector::find($project->sector_id);
        $sectors = $this->sector->get();
        // dd($gallery->sector()->get('name'));
        return view('backend.project.edit', compact('project','sectors','sector_search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, project $project)
    {
        if ($project->update($request->data())) {
            $project->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $project);
            }
        }
        return redirect()->route('project.index')->withSuccess(trans('project has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->project->find($id);
        $project->delete();
        return redirect()->route('project.index')->withSuccess(trans('project has been deleted'));
    }   

    function uploadFile(Request $request, $project)
    {
        $file = $request->file('image');
        $path = 'uploads/project';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($project->image))
            $this->__deleteImages($project);

        $data['image'] = $fileName;
        $this->updateImage($project->id, $data);

    }

    public function updateImage($projectId, array $data)
    {
        try {
            $project = $this->project->find($projectId);
            $project = $project->update($data);
            return $project;
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
