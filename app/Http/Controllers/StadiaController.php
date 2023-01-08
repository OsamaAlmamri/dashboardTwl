<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:stadia-create', ['only' => ['create','store']]);
        $this->middleware('permission:stadia-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:stadia-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:stadia-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('stadia-read'))abort(403);
        $stadia =  Stadium::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.stadia.index',compact('stadia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('stadia-create'))abort(403);
        return view('admin.stadia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('stadia-create'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $stadium = Stadium::create([
            'user_id'=>auth()->user()->id,
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/stadia/',
                'type'=>'stadium',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $stadium->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.stadium_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.stadia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadium)
    {
        if(!auth()->user()->isAbleTo('stadia-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function edit(Stadium $stadium)
    {
        if(!auth()->user()->isAbleTo('stadia-update'))abort(403);

        return view('admin.stadia.edit',compact('stadium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        if(!auth()->user()->isAbleTo('stadia-update'))abort(403);
//        $request->merge([
//            'slug'=>\MainHelper::slug($request->slug)
//        ]);



        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $stadium->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/stadia/',
                'type'=>'stadium',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $stadium->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.stadium_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.stadia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $stadium)
    {
        if(!auth()->user()->isAbleTo('stadia-delete'))abort(403);
        $stadium->delete();
        toastr()->success(__('utils/toastr.stadium_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.stadia.index');
    }
}
