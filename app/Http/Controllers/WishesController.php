<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishesController extends Controller
{
    public function __construct() {

    }

    protected $except = [
        'ẳng',
        'buồi', 'bú', 'bớp',
        'cẩu', 'cặc', 'chó', 'cứt', 'cút', 'cu', 'câm', 'cắn', 'chết', 'chêt', 'chet', 'chít', 'ckó', 'cc', 'cl', 'ckim', 'chém', 'cave', 'chịch', 'cưt',
        'dở', 'dâm', 'dm', 'dái', 'dkm',
        'đụ', 'địt', 'đéo', 'đĩ', 'đực', 'đm', 'đmm', 'đcmm', 'đcm', 'đkm', 'đ!t', 'đ.ị.t', 'đị.t', 'đ.ịt', 'đái', 'điếm', 'đít', 'đit', 'đớp',
	'ẻ', 'ể',
	'giết',
        'ỉa', 'ĩa',
	'hãm', 'hiếp', 'hốc',
	'kứt', 'ku', 'kưt',
	'mu', 'máu',
	'ngu',
        'lồn', 'liếm', 'lìn', 'lol', 'lòn',
        'sít', 'sủa',
	'tè', 'trym', 'trim', 'tử',
        'xủa', 'xl', 'xaolol', 'xaolon', 'xamlol', 'xamlon',
        'vãi', 'vl', 'vc', 'vcc', 'vcl', 'vailon', 'vailol', 'v.c.l', 'v.c',
        'arse', 'arsehead', 'arsehole', 'ass', 'asshold',
        'bastard', 'bitch', 'bloody', 'bollocks', 'brotherfucker', 'bugger', 'bullshit',
        'child-fucker', 'cock', 'cocksucker', 'crap', 'cunt',
        'damn', 'dick', 'dickhead', 'dyke', 'dork', 'die',
        'fatherfucker', 'frigger', 'fuck', 'fuckface',
        'goddamn', 'godsdamn',
        'hell', 'horseshit', 'holyshit',
        'kike', 'kill',
        'motherfucker',
        'nigga', 'nigra',
        'piss', 'prick', 'pussy', 'porn', 'penis',
        'shit', 'shite', 'sisterfucker', 'slut', 'spastic', 'scum', 'scumbag', 'sex',
        'turd', 'twat',
        'wanker'
    ];

    public function index() {
        $wishes = DB::table('loi_chuc')->select('id', 'name', 'key', 'content')->get()->toArray();
        shuffle($wishes);
        $data = array_slice($wishes, 0, 6);

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
        $checkBadWords = $this->checkBadWords($request->content);

        if ($checkBadWords['error'] != 0) {
            return response()->json([
                'error' => 1,
                'data' => $checkBadWords['text']
            ]);
        }
        
        $id = DB::table('loi_chuc')->insertGetId(
            [
                'name' => $request->name, 
                'key' => $this->genUid(6),
                'content' => $request->content
            ]
        );
        return response()->json([
            'error' => 0,
            'data' => $id
        ]);
    }

    public function genUid($l){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
    }

    public function checkBadWords($text)
    {
        $arrText = explode(' ', $text);
        $newArr = [];

        foreach ($arrText as $text) {
            if (in_array(strtolower($text), $this->except)) {
                return [
                    'error' => 1,
                    'text' => $text
                ];
            }
            $newArr[] = $text;
        }

        $newArr = implode(' ', $newArr);

        return [
            'error' => 0,
            'text' => $text
        ];
    }
}
