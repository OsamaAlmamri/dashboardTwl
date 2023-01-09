<?php

namespace App\Http\Controllers;

use App\Models\Team2;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:teams-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:teams-read', ['only' => ['show', 'index']]);
        $this->middleware('permission:teams-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:teams-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->isAbleTo('teams-read')) abort(403);
        $teams = Team2::where(function ($q) use ($request) {
            if ($request->id != null)
                $q->where('id', $request->id);
            if ($request->q != null)
                $q->where('title', 'LIKE', '%' . $request->q . '%')->orWhere('name', 'LIKE', '%' . $request->q . '%');
        })->orderBy('id', 'DESC')->paginate();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function positions()
    {
        return ['Midfielder', 'Defender', 'Forworder', 'GoalKeeper', 'Coach'];
    }

    public function create()
    {
        if (!auth()->user()->isAbleTo('teams-create')) abort(403);
        $positions=$this->positions();
        return view('admin.teams.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->isAbleTo('teams-create')) abort(403);
        $request->merge([
            'slug' => \MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name' => "required|max:190",
            'number' => "required|max:190",
            'description' => "nullable|max:10000",
            'meta_description' => "nullable|max:10000",
        ]);
        $team = Team2::create([
            'user_id' => auth()->user()->id,
            "name" => $request->name,
            "position" => $request->position,
            "number" => $request->number,
            "description" => $request->description,
            "meta_description" => $request->meta_description,
        ]);
        if ($request->hasFile('image')) {
            $file = $this->store_file([
                'source' => $request->image,
                'validation' => "image",
                'path_to_save' => '/uploads/teams/',
                'type' => 'Team',
                'user_id' => \Auth::user()->id,
                'resize' => [500, 1000],
                'small_path' => 'small/',
                'visibility' => 'PUBLIC',
                'file_system_type' => env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize' => true
            ]);
            $team->update(['image' => $file['filename']]);
        }
        toastr()->success(__('utils/toastr.Team_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.teams2.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Team2 $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team2 $team)
    {
        if (!auth()->user()->isAbleTo('teams-read')) abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team2 $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team2 $team, $id)
    {
        if (!auth()->user()->isAbleTo('teams-update')) abort(403);
        $team = Team2::find($id);
        $positions=$this->positions();
        return view('admin.teams.edit', compact('team','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team2 $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team2 $team, $id)
    {
        if (!auth()->user()->isAbleTo('teams-update')) abort(403);
//        $request->merge([
//            'slug'=>\MainHelper::slug($request->slug)
//        ]);

        $team = Team2::find($id);


        $request->validate([
            'name' => "required|max:190",
            'number' => "required|max:190",
            'description' => "nullable|max:10000",
            'meta_description' => "nullable|max:10000",
        ]);
        $team->update([
            "position" => $request->position,
            "name" => $request->name,
            "number" => $request->number,
            "description" => $request->description,
            "meta_description" => $request->meta_description,
        ]);
        if ($request->hasFile('image')) {
            $file = $this->store_file([
                'source' => $request->image,
                'validation' => "image",
                'path_to_save' => '/uploads/teams/',
                'type' => 'Team',
                'user_id' => \Auth::user()->id,
                'resize' => [500, 1000],
                'small_path' => 'small/',
                'visibility' => 'PUBLIC',
                'file_system_type' => env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize' => true
            ]);
            $team->update(['image' => $file['filename']]);
        }
        toastr()->success(__('utils/toastr.Team_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.teams2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team2 $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team2 $team)
    {
        if (!auth()->user()->isAbleTo('teams-delete')) abort(403);
        $team->delete();
        toastr()->success(__('utils/toastr.Team_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.teams2.index');
    }
}
