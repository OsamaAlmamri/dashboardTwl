<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:projects-create', ['only' => ['create','store']]);
        $this->middleware('permission:projects-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:projects-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:projects-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('projects-read'))abort(403);
        $projects =  Project::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('projects-create'))abort(403);
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('projects-create'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
        ]);
        $project = Project::create([
            'user_id'=>auth()->user()->id,
            "title"=>$request->title,
            "url"=>$request->url,
            "description"=>$request->description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/projects/',
                'type'=>'Project',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $project->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.project_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if(!auth()->user()->isAbleTo('projects-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if(!auth()->user()->isAbleTo('projects-update'))abort(403);
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if(!auth()->user()->isAbleTo('projects-update'))abort(403);

        $request->validate([
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $project->update([
            "title"=>$request->title,
            "description"=>$request->description,
            "url"=>$request->url,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/projects/',
                'type'=>'Project',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $project->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.project_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if(!auth()->user()->isAbleTo('projects-delete'))abort(403);
        $project->delete();
        toastr()->success(__('utils/toastr.project_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.projects.index');
    }
}
