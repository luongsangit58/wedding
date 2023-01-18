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

    // Get All Invitations
    public function getInvitations() {
        $invitations = DB::table('thiep_moi')->orderBy('key', 'asc')->get()->toArray();
        if ($invitations) {
            return view('invitation/list')->with('invitations', $invitations);
        } else {
            return redirect('/');
        }
    }

    // Form Insert Invitation
    public function insertInvitationForm() {
        return view('invitation/insert');
    }

    // Insert Invitation
    public function insertInvitation(Request $request) {
        if ($request->isMethod('post')) {
            try {
                $id = DB::table('thiep_moi')->insertGetId(
                    [
                        'name' => $request->name, 
                        'key' => $request->key,
                        'name_display' => $request->name_display,
                        'relationship' => $request->relationship
                    ]
                );

                return redirect('/invitation/getAll');
            } catch (\Exception $th) {
                return response()->json([
                    'error' => 1,
                    'message' => $th
                ]);
            }
        }
    }

    // Form Update Invitation
    public function updateInvitationForm($id) {
        $invitation = DB::table('thiep_moi')->where('id', $id)->first();

        return view('invitation/update')->with('invitation', $invitation);
    }

    // Update invitation by ID
    public function updateInvitationById(Request $request) {
        if ($request->isMethod('post')) {
            try {
                DB::table('thiep_moi')->where('id', $request->id)->update(['name' => $request->name]);
                DB::table('thiep_moi')->where('id', $request->id)->update(['key' => $request->key]);
                DB::table('thiep_moi')->where('id', $request->id)->update(['name_display' => $request->name_display]);
                DB::table('thiep_moi')->where('id', $request->id)->update(['relationship' => $request->relationship]);

                return redirect('/invitation/getAll');
            } catch (\Exception $th) {
                return response()->json([
                    'error' => 1,
                    'message' => $th
                ]);
            }
        }
    }

    // Delete invitation by ID
    public function deleteInvitationById($id) {
        try {
            DB::table('thiep_moi')->where('id', $id)->delete();

            return redirect('/invitation/getAll');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 1,
                'message' => $th
            ]);
        }
    }
}
