<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:leagues-create', ['only' => ['create','store']]);
        $this->middleware('permission:leagues-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:leagues-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:leagues-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('leagues-read'))abort(403);
        $leagues =  League::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.leagues.index',compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('leagues-create'))abort(403);
        return view('admin.leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('leagues-create'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $league = League::create([
            'user_id'=>auth()->user()->id,
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/leagues/',
                'type'=>'league',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $league->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.league_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.leagues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        if(!auth()->user()->isAbleTo('leagues-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        if(!auth()->user()->isAbleTo('leagues-update'))abort(403);

        return view('admin.leagues.edit',compact('league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, League $league)
    {
        if(!auth()->user()->isAbleTo('leagues-update'))abort(403);
//        $request->merge([
//            'slug'=>\MainHelper::slug($request->slug)
//        ]);



        $request->validate([
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $league->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/leagues/',
                'type'=>'league',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $league->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.league_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.leagues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        if(!auth()->user()->isAbleTo('leagues-delete'))abort(403);
        $league->delete();
        toastr()->success(__('utils/toastr.league_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.leagues.index');
    }
}
