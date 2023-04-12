<?php

namespace App\Http\Controllers;

use App\Models\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $requests = Request::all();

        $requests = $requests->groupBy(function ($req){
            return $req->request_status;
        })->map(function ($req){
            return $req->count();
        });

        return view('home', [
            'requests_count' => $requests
        ]);
    }
}
