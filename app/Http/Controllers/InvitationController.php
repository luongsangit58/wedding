<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function __construct() {

    }

    public function index($key) {
        $invitation = DB::table('thiep_moi')->where('key', $key)->first();
        if ($invitation) {
            return view('invitation')->with('invitation', $invitation);
        } else {
            return redirect('/');
        }
    }
}
