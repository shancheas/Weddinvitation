<?php

namespace App\Http\Controllers;

use App\Entity\Invitation;

class HomeController extends Controller
{
    private $invitation;

    /**
     * Create a new controller instance.
     *
     * @param Invitation $invitation
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
        $invitation = $this->invitation->userInvitation(auth()->user()->id)->get();
        return view('users/dashboard', compact('invitation'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function details($id)
    {
        $invitation = $this->invitation->find($id);
        $details = $invitation->details;
        $attendRaw = $details->countBy(function ($detail) {
           return $detail->response;
        });
        $attend = [
            'not' => isset($attendRaw[0]) ? $attendRaw[0] : 0,
            'will' => isset($attendRaw[1]) ? $attendRaw[1] : 0,
            'maybe' => isset($attendRaw[2]) ? $attendRaw[2] : 0,
        ];
        $attend['total'] = $attend['not'] + $attend['will'] + $attend['maybe'];
        $attend['percentage'] = $attend['total'] ? round($attend['will'] / $attend['total'], 4) * 100 : 0;
        $attend['color'] = $attend['percentage'] >= 0.5 ? 'text-success' : 'text-danger';
        $invitation = $this->invitation->find($id);
        return view('users/invitation/details', compact('details', 'attend', 'invitation'));
    }
}
