<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramAuthController extends Controller
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
        return view('home');
    }

    public function show() {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'kayo_xlv')->first();

        return view('instagram-auth-page', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
    }
}
