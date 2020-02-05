<?php

namespace App\Http\Controllers;

use App\Entity\Invitation;

class HomeController extends Controller
{
    private $invitation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->middleware('auth');
        $this->invitation = $invitation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $invitation = $this->invitation->all();
        return view('users/dashboard', compact('invitation'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        return view('users/invitation/details');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function editor()
    {
        return view('editor/editor');
    }
}
