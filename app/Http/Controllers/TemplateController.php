<?php

namespace App\Http\Controllers;

use App\Entity\Invitation;
use App\Entity\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    private $invitation;
    private $template;

    /**
     * Create a new controller instance.
     *
     * @param Invitation $invitation
     * @param Template $template
     */
    public function __construct(Invitation $invitation, Template $template)
    {
        $this->middleware('auth');
        $this->invitation = $invitation;
        $this->template = $template;
    }

    public function form()
    {
        return view('users/invitation/templates');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function editor($id)
    {
        $themes = $this->template->all();
        $invitation = $this->invitation->find($id);
        return view('editor/editor', compact('themes', 'invitation'));
    }
}
