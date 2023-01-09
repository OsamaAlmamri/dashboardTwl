<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:championships-create', ['only' => ['create','store']]);
        $this->middleware('permission:championships-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:championships-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:championships-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('championships-read'))abort(403);
        $championships =  Championship::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.championships.index',compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('championships-create'))abort(403);
        return view('admin.championships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('championships-create'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $championship = Championship::create([
            'user_id'=>auth()->user()->id,
            "title"=>$request->title,

        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/championships/',
                'type'=>'Championship',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $championship->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.championship_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.championships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        if(!auth()->user()->isAbleTo('championships-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function edit(Championship $championship)
    {
        if(!auth()->user()->isAbleTo('championships-update'))abort(403);
        return view('admin.championships.edit',compact('championship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championship $championship)
    {
        if(!auth()->user()->isAbleTo('championships-update'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $championship->update([
            "title"=>$request->title,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/championships/',
                'type'=>'Championship',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $championship->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.championship_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.championships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $championship)
    {
        if(!auth()->user()->isAbleTo('championships-delete'))abort(403);
        $championship->delete();
        toastr()->success(__('utils/toastr.championship_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.championships.index');
    }
}
