<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\Championship;
use App\Models\Client;
use App\Models\ClubMatch;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Team2;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams = Team2::orderBy('id', 'ASC')->get();
        $services = Service::orderBy('id', 'ASC')->get();
        $clients = Client::orderBy('id', 'ASC')->get();
        $partners = Partner::orderBy('id', 'ASC')->get();
        $matches= ClubMatch::orderBy('id', 'DESC')->get();
        $championships= Championship::orderBy('id', 'DESC')->get();
        $announcements = Announcement::orderBy('id', 'ASC')->get();
        $positions=  ['Midfielder', 'Defender', 'Forworder', 'GoalKeeper', 'Coach'];
        $articles = Article::with(['categories','tags'])
            ->withCount(['comments'=>function($q){$q->where('reviewed',1);}])
            ->orderBy('id','DESC')->limit(10)->get();

        return view('front.index', compact('championships','positions','partners','teams','matches','services', 'clients','announcements','articles'));

    }
}
