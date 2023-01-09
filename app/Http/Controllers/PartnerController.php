<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:partners-create', ['only' => ['create','store']]);
        $this->middleware('permission:partners-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:partners-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:partners-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('partners-read'))abort(403);
        $partners =  Partner::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('partners-create'))abort(403);
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('partners-create'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $partner = Partner::create([
            'user_id'=>auth()->user()->id,
            "title"=>$request->title,

        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/partners/',
                'type'=>'Partner',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $partner->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.partner_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        if(!auth()->user()->isAbleTo('partners-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        if(!auth()->user()->isAbleTo('partners-update'))abort(403);
        return view('admin.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        if(!auth()->user()->isAbleTo('partners-update'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $partner->update([
            "title"=>$request->title,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/partners/',
                'type'=>'Partner',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $partner->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.partner_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if(!auth()->user()->isAbleTo('partners-delete'))abort(403);
        $partner->delete();
        toastr()->success(__('utils/toastr.partner_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.partners.index');
    }
}
