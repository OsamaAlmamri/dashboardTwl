<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients-create', ['only' => ['create','store']]);
        $this->middleware('permission:clients-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:clients-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:clients-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('clients-read'))abort(403);
        $clients =  Client::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('clients-create'))abort(403);
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('clients-create'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $client = Client::create([
            'user_id'=>auth()->user()->id,
            "title"=>$request->title,

        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/clients/',
                'type'=>'Client',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $client->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.client_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        if(!auth()->user()->isAbleTo('clients-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if(!auth()->user()->isAbleTo('clients-update'))abort(403);
        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if(!auth()->user()->isAbleTo('clients-update'))abort(403);


        $request->validate([
            'title'=>"required|max:190",
        ]);
        $client->update([
            "title"=>$request->title,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/clients/',
                'type'=>'Client',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $client->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.client_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if(!auth()->user()->isAbleTo('clients-delete'))abort(403);
        $client->delete();
        toastr()->success(__('utils/toastr.client_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.clients.index');
    }
}
