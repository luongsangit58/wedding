<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\DemoMail;
use App\Mail\LuckyDrawMail;
use App\Mail\NotificationMail;

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
        $wishes = DB::table('loi_chuc')->get()->toArray();
        shuffle($wishes);
        $data = array_slice($wishes, 0, 6);

        foreach ($data as $key => $value) {
            $value->email = $this->obfuscateEmail($value->email);
        }

        $luckyDraw = DB::table('loi_chuc')->where('lucky_draw', '1')->get()->toArray();
        foreach ($luckyDraw as $key => $value) {
            $value->email = $this->obfuscateEmail($value->email);
        }

        return view("index", [
            "wishes" => $data,
            'luckydraw' => $luckyDraw
        ]);
    }

    // Get all
    public function getWishes() {
        $wishes = DB::table('loi_chuc')->get()->toArray();
        shuffle($wishes);

        foreach ($wishes as $key => $value) {
            $value->email = $this->obfuscateEmail($value->email);
        }

        return view('wisheslist')->with('wishes', $wishes);
    }

    // POST lucky draw wish
    public function postLuckyDrawWish() {
        try {            
            $wishes = DB::table('loi_chuc')->where('lucky_draw', '0')->get()->toArray();
            shuffle($wishes);

            $luckyDraw1 = current($wishes);
            $luckyDraw2 = end($wishes);

            // Update lucky draw
            DB::table('loi_chuc')->where('id', $luckyDraw1->id)->update(['lucky_draw' => '1']);
            DB::table('loi_chuc')->where('id', $luckyDraw2->id)->update(['lucky_draw' => '1']);


            // Data send email lucky draw
            $mailLuckyDraw1 = [
                'name' => trim($luckyDraw1->name),
                'key' => $luckyDraw1->key
            ];
            
            $mailLuckyDraw2 = [
                'name' => trim($luckyDraw2->name),
                'key' => $luckyDraw2->key
            ];

            // Send email lucky draw 1
            try {    
                Mail::to($luckyDraw1->email)->send(new LuckyDrawMail($mailLuckyDraw1));
            } catch (\Exception $th) {
                Mail::to('luongsangit58@gmail.com')->send(new LuckyDrawMail($mailLuckyDraw1));
            }

            // Send email lucky draw 2
            try {    
                Mail::to($luckyDraw1->email)->send(new LuckyDrawMail($mailLuckyDraw2));
            } catch (\Exception $th) {
                Mail::to('luongsangit58@gmail.com')->send(new LuckyDrawMail($mailLuckyDraw2));
            }
            
            foreach ($wishes as $key => $value) {
                $value->email = $this->obfuscateEmail($value->email);
            }

            return response()->json([
                'error' => 0,
                'lucky_draw_1' => $luckyDraw1,
                'lucky_draw_2' => $luckyDraw2
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'error' => 1,
                'data' => $th
            ]);
        }
    }

    // POST lucky draw wish
    public function getLuckyDrawWish() {
        $count = DB::table('loi_chuc')->where('lucky_draw', '1')->count();
        if ($count >= 2) {
            return redirect('/');
        } else {
            return view('wishes/luckydraw');
        }
    }

    // Get list wishes
    public function getListWishesAPI() {
        $wishes = DB::table('loi_chuc')->get()->toArray();

        return view('wishes/list')->with('wishes', $wishes);
    }

    // Form Update wish
    public function updateForm($id) {
        $wish = DB::table('loi_chuc')->where('id', $id)->first();

        return view('wishes/update')->with('wish', $wish);
    }

    // Update wish by ID
    public function updateWishById(Request $request) {
        if ($request->isMethod('post')) {
            try {
                DB::table('loi_chuc')->where('id', $request->id)->update(['name' => $request->name]);
                DB::table('loi_chuc')->where('id', $request->id)->update(['email' => $request->email]);
                DB::table('loi_chuc')->where('id', $request->id)->update(['content' => $request->content]);
                DB::table('loi_chuc')->where('id', $request->id)->update(['key' => $request->key]);
                DB::table('loi_chuc')->where('id', $request->id)->update(['sent_email' => $request->sent_email]);

                return redirect('/wishes/getAll');
            } catch (\Exception $th) {
                return response()->json([
                    'error' => 1,
                    'message' => $th
                ]);
            }
        }
    }

    // Get wish by email
    public function getWishByEmail($email) {
        $wish = DB::table('loi_chuc')->where('email', $email)->first();

        return $wish;
    }

    // Update sent email
    public function updateSentEmail($email) {
        try {
            DB::table('loi_chuc')->where('email', $email)->update(['sent_email' => 1]);
            return redirect('/wishes/getAll');
        } catch (\Exception $th) {
            return response()->json([
                'error' => 1,
                'message' => $th
            ]);
        }
    }

    // Delete wish
    public function deleteWishByEmail($email) {
        try {
            DB::table('loi_chuc')->where('email', $email)->delete();
            return redirect('/wishes/getAll');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 1,
                'message' => $th
            ]);
        }
    }

    // Insert
    public function insertWishes(Request $request) {
        // check bad words name
        $checkBadWordName = $this->checkBadWords(trim($request->name));
        if ($checkBadWordName['error'] != 0) {
            return response()->json([
                'error' => 1, // Loi check bad words
                'data' => 'Nội dung bạn nhập có chứa từ "'.$checkBadWordName['text'].'" chưa đúng chuẩn mực, nhạy cảm và không phù hợp!'
            ]);
        }

        // check bad words content
        $checkBadWordEmail = $this->checkBadWords(trim($request->content));
        if ($checkBadWordEmail['error'] != 0) {
            return response()->json([
                'error' => 1, // Loi check bad words
                'data' => 'Nội dung bạn nhập có chứa từ "'.$checkBadWordEmail['text'].'" chưa đúng chuẩn mực, nhạy cảm và không phù hợp!'
            ]);
        }

        // validate email
        if (!filter_var(trim($request->email), FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            return response()->json([
                'error' => 2, 
                'data' => 'Email bạn nhập chưa đúng định dạng. Vui lòng nhập lại!'
            ]);
        }

        // check trung email
        $wishByEmail = $this->getWishByEmail(trim($request->email));
        if ($wishByEmail) {
            return response()->json([
                'error' => 3, // Loi trung email
                'data' => 'Email '.$wishByEmail->email.' đã từng được sử dụng để gửi lời chúc. Vui lòng nhập email khác!'
            ]);
        }

        $key = $this->genUid(4);
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $curentTime = date("Y-m-d H:i:s");
            try {
                $id = DB::table('loi_chuc')->insertGetId(
                    [
                        'name' => trim($request->name), 
                        'key' => $key,
                        'content' => trim($request->content),
                        'email' => trim($request->email),
                        'time' => $curentTime
                    ]
                );
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 500,
                    'data' => 'Đã có lỗi xảy ra với dữ liệu bạn gửi. Vui lòng thử lại sau :('
                ]);
            }
               
            // Sent email until 12a.m 25/02/2023
            if (time() < config('global.stop_send_wish')) {
                try {
                    $mailData = [
                        'name' => trim($request->name),
                        'content' => trim($request->content),
                        'key' => $key
                    ];
    
                    Mail::to($request->email)->send(new DemoMail($mailData));
                    $affected = DB::table('loi_chuc')->where('id', $id)->update(['sent_email' => 1]);

                    $mailNotificationData = [
                        'name' => $request->name,
                        'content' => trim($request->content),
                        'email' => $request->email,
                        'time' => $curentTime
                    ];
                    Mail::to('luongsangit58@gmail.com')->send(new NotificationMail($mailNotificationData));
                } catch (\Exception $e) {
                    $mailData = [
                        'name' => 'Gửi email thất bại ['.$request->email.'] '.$request->name,
                        'content' => trim($request->content),
                        'key' => $key
                    ];
                    Mail::to('luongsangit58@gmail.com')->send(new DemoMail($mailData));
                }
            }
            
            return response()->json([
                'error' => 0,
                'data' => $id
            ]);
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
        return substr(str_shuffle("0123456789"), 0, $l);
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
        // $len  = floor(strlen($name) - 3);
        $len = (strlen($name) > 3) ? 3 : 2;
    
        return substr($name, 0, strlen($name) - $len) . str_repeat('*', $len) . "@" . end($em);   
    }

    public function getRealIPAddress()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return [
            'error' => 0,
            'ip' => $ip
        ];
    }
}
