<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\DemoMail;

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
        $wishes = DB::table('loi_chuc')->select('id', 'name', 'key', 'content', 'email')->get()->toArray();
        shuffle($wishes);
        $data = array_slice($wishes, 0, 6);

        foreach ($data as $key => $value) {
            $value->email = $this->obfuscateEmail($value->email);
        }

        return view('index')->with('wishes', $data);
    }

    // Get all
    public function getWishes() {
        $wishes = DB::table('loi_chuc')->select('id', 'name', 'key', 'content', 'email')->get()->toArray();
        shuffle($wishes);

        foreach ($wishes as $key => $value) {
            $value->email = $this->obfuscateEmail($value->email);
        }

        return view('wisheslist')->with('wishes', $wishes);
    }

    // Get wish by email
    public function getWishByEmail($email) {
        $wish = DB::table('loi_chuc')->where('email', $email)->first();

        return $wish;
    }

    // Insert
    public function insertWishes(Request $request) {
        // check bad words name
        $checkBadWordName = $this->checkBadWords($request->name);
        if ($checkBadWordName['error'] != 0) {
            return response()->json([
                'error' => 1, // Loi check bad words
                'data' => $checkBadWordName['text']
            ]);
        }

        // check bad words content
        $checkBadWordEmail = $this->checkBadWords($request->content);
        if ($checkBadWordEmail['error'] != 0) {
            return response()->json([
                'error' => 2, // Loi check bad words
                'data' => $checkBadWordEmail['text']
            ]);
        }

        // trung email
        $wishByEmail = $this->getWishByEmail($request->email);
        if ($wishByEmail) {
            return response()->json([
                'error' => 3, // Loi trung email
                'data' => $wishByEmail->email
            ]);
        }

        $key = $this->genUid(6);
        try {
            $id = DB::table('loi_chuc')->insertGetId(
                [
                    'name' => $request->name, 
                    'key' => $key,
                    'content' => $request->content,
                    'email' => $request->email
                ]
            );

            if ($id) {
                $mailData = [
                    'name' => $request->name,
                    'content' => $request->content,
                    'key' => $key
                ];
                 
                try {
                    Mail::to($request->email)->send(new DemoMail($mailData));
                    $affected = DB::table('loi_chuc')->where('id', $id)->update(['sent_email' => 1]);
                } catch (\Exception $e) {
                    $mailData = [
                        'name' => '['.$request->email.'] '.$request->name,
                        'content' => $request->content,
                        'key' => $key
                    ];
                    Mail::to('luongsangit58@gmail.com')->send(new DemoMail($mailData));
                }
                
                return response()->json([
                    'error' => 0,
                    'data' => $id
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 500,
                'data' => 'Đã có lỗi xảy ra :('
            ]);
        }

        return response()->json([
            'error' => 500,
            'data' => 'Đã có lỗi xảy ra :('
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

    public function obfuscateEmail($email)
    {   
        if ($email == '') {
            return '';
        }

        $em   = explode("@",$email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len  = floor(strlen($name)/2);
    
        return substr($name, 0, $len) . str_repeat('*', $len) . "@" . end($em);   
    }
}
