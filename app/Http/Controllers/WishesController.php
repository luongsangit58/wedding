<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishesController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $wishes = DB::table('loi_chuc')->select('id', 'name', 'key', 'content')->get()->toArray();
        shuffle($wishes);
        $data = array_slice($wishes, 0, 3);

        return view('index')->with('wishes', $data);
    }

    // Get
    public function getWishes() {
        $wishes = DB::table('loi_chuc')->select('id', 'name', 'key', 'content')->get()->toArray();
        shuffle($wishes);

        return view('wisheslist')->with('wishes', $wishes);
    }

    // Insert
    public function insertWishes(Request $request) {
        $id = DB::table('loi_chuc')->insertGetId(
            [
                'name' => $request->name, 
                'key' => $this->genUid(6),
                'content' => $request->content
            ]
        );

        return response()->json([
            'error' => 0,
            'data' => $id,
        ]);
    }

    public function genUid($l){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
    }
}
