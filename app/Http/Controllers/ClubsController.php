<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clubs-create', ['only' => ['create','store']]);
        $this->middleware('permission:clubs-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:clubs-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:clubs-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('clubs-read'))abort(403);
        $clubs =  Club::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.clubs.index',compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('clubs-create'))abort(403);
        return view('admin.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('clubs-create'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $club = Club::create([
            'user_id'=>auth()->user()->id,
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/clubs/',
                'type'=>'club',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $club->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.club_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        if(!auth()->user()->isAbleTo('clubs-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        if(!auth()->user()->isAbleTo('clubs-update'))abort(403);
//        $club=Club::find($id);


        return view('admin.clubs.edit',compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        if(!auth()->user()->isAbleTo('clubs-update'))abort(403);
//        $request->merge([
//            'slug'=>\MainHelper::slug($request->slug)
//        ]);


        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $club->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/clubs/',
                'type'=>'club',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $club->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.club_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        if(!auth()->user()->isAbleTo('clubs-delete'))abort(403);
        $club->delete();
        toastr()->success(__('utils/toastr.club_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clubs.index');
    }
}
