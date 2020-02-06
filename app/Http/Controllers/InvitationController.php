<?php

namespace App\Http\Controllers;

use App\Entity\DetailInvitation;
use App\Entity\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    private $invitation;
    private $invitationResponse;
    private $yunikaResponse;

    /**
     * Create a new controller instance.
     *
     * @param Invitation $invitation
     * @param DetailInvitation $details
     */
    public function __construct(Invitation $invitation, DetailInvitation $details)
    {
        $this->invitation = $invitation;
        $this->invitationResponse = $details;

        $this->yunikaResponse = [
            'name' => 'Yunika Team',
            'is_show' => 1,
            'response' => 0
        ];
    }

    public function show($id)
    {
        $invitation = $this->invitation->find($id);

        return response($invitation);
    }

    public function store(Request $request)
    {
        $params = $request->except('time');
        $params['template_id'] = 1;
        $result = $this->invitation->create($request->except('time'));
        if ($result) {
            $brideNames = $params['bridegroom'] . ' & ' . $params['bride'];
            $this->yunikaResponse['invitation_id'] = $result->id;
            $this->yunikaResponse['comment'] = "Selamat $brideNames atas pernikahanya. Semoga Langgeng selama lamanya :). Maaf ngk bisa dateng ke nikahanya nih, tapi kami selalu mendoakan yang terbaik buat kamu :D";
            $this->invitationResponse->create($this->yunikaResponse);
        }
        return response([
            'data' => [
                'id' => $result->id
            ]
        ]);
    }

    public function delete($id)
    {
        $result = $this->invitation->find($id)->delete();
        dd($result);
    }

    public function setContent($id, Request $request)
    {
        $invitation = $this->invitation->find($id);
        $invitation->content = $request->htmlContent;
        $invitation->save();
    }
}
