<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $invitations = DB::table('loi_chuc')->select('id', 'name', 'key', 'invitation')->get()->toArray();
        shuffle($invitations);
        $data = array_slice($invitations, 0, 3);

        return view('index')->with('invitations', $data);
    }

    // GET
    public function getInvitation() {
        return '123';
    }

    // POST
    public function addInvitation() {

    }
}
