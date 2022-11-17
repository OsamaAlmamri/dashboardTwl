<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Client;
use App\Models\Service;
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
        $services = Service::orderBy('id', 'ASC')->get();
        $clients = Client::orderBy('id', 'ASC')->get();
        $announcements = Announcement::orderBy('id', 'ASC')->get();

        return view('front.index', compact('services', 'clients','announcements'));

    }
}
