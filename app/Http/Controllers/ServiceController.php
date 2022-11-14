<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:services-create', ['only' => ['create','store']]);
        $this->middleware('permission:services-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:services-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:services-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('services-read'))abort(403);
        $services =  Service::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('services-create'))abort(403);
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('services-create'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:services,slug",
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $service = Service::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/services/',
                'type'=>'Service',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $service->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.service_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        if(!auth()->user()->isAbleTo('services-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if(!auth()->user()->isAbleTo('services-update'))abort(403);
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if(!auth()->user()->isAbleTo('services-update'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:services,slug,".$service->id,
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $service->update([
            "slug"=>$request->slug,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/services/',
                'type'=>'Service',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $service->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.service_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if(!auth()->user()->isAbleTo('services-delete'))abort(403);
        $service->delete();
        toastr()->success(__('utils/toastr.service_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.services.index');
    }
}
