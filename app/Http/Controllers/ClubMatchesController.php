<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubMatch;
use App\Models\League;
use App\Models\Stadium;
use Illuminate\Http\Request;

class ClubMatchesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:club-matchs-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:club-matchs-read', ['only' => ['show', 'index']]);
        $this->middleware('permission:club-matchs-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:club-matchs-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->isAbleTo('club-matchs-read')) abort(403);
        $club_matches = ClubMatch::where(function ($q) use ($request) {
            if ($request->id != null)
                $q->where('id', $request->id);
            if ($request->q != null)
                $q->where('name', 'LIKE', '%' . $request->q . '%');
        })->orderBy('id', 'DESC')->paginate();

        return view('admin.club_matches.index', compact('club_matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->isAbleTo('club-matchs-create')) abort(403);
        $clubs = Club::all();
        $stadia = Stadium::all();
        $leagues = League::all();
        return view('admin.club_matches.create', compact('clubs','stadia','leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->isAbleTo('club-matchs-create')) abort(403);
        $request->merge([
            'slug' => \MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'club1_id' => "required",
            'club2_id' => "required",
            'stadium_id' => "required",
            'league_id' => "required",
            'time' => "required",
            'club1_result' => "nullable|numeric",
            'club2_result' => "nullable|numeric",

        ]);
        $club_matche = ClubMatch::create([
            'club1_id' => $request->club1_id,
            'club2_id' => $request->club2_id,
            'stadium_id' => $request->stadium_id,
            'league_id' => $request->league_id,
            'time' =>$request->time,
            'club1_result' => $request->club1_result,
            'club2_result' => $request->club2_result,
            'user_id' => auth()->user()->id,


        ]);

        toastr()->success(__('utils/toastr.club_matche_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.club_matches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ClubMatch $club_matche
     * @return \Illuminate\Http\Response
     */
    public function show(ClubMatch $club_matche)
    {
        if (!auth()->user()->isAbleTo('club-matchs-read')) abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ClubMatch $club_matche
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubMatch $club_matche)
    {
        if (!auth()->user()->isAbleTo('club-matchs-update')) abort(403);


        return view('admin.club_matches.edit', compact('club_matche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClubMatch $club_matche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubMatch $club_matche)
    {
        if (!auth()->user()->isAbleTo('club-matchs-update')) abort(403);
//        $request->merge([
//            'slug'=>\MainHelper::slug($request->slug)
//        ]);


        $request->validate([
            'club1_id' => "required",
            'club2_id' => "required",
            'stadium_id' => "required",
            'league_id' => "required",
            'time' => "required",
            'club1_result' => "nullable|numeric",
            'club2_result' => "nullable|numeric",
        ]);
        $club_matche->update([
            'club1_id' => $request->name,
            'club2_id' => $request->name,
            'stadium_id' => $request->name,
            'league_id' => $request->name,
            'time' =>$request->name,
            'club1_result' => $request->name,
            'club2_result' => $request->name,
            'user_id' => auth()->user()->id,
        ]);

        toastr()->success(__('utils/toastr.club_matche_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.club_matches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ClubMatch $club_matche
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubMatch $club_matche)
    {
        if (!auth()->user()->isAbleTo('club-matchs-delete')) abort(403);
        $club_matche->delete();
        toastr()->success(__('utils/toastr.club_matche_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.club_matches.index');
    }
}
