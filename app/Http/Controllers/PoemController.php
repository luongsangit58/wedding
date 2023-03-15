<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PoemController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $poems = DB::table('tho')->get()->toArray();

        return view('poem/index')->with('poems', $poems);
    }

    public function detail($slug) {
        $poem = DB::table('tho')->where('slug', $slug)->first();
        if ($poem) {
            $next = DB::table('tho')->where('id', $poem->id + 1)->first();
            $prev = DB::table('tho')->where('id', $poem->id - 1)->first();
            $data = [
                'poem' => $poem,
                'next' => $next,
                'prev' => $prev
            ];
            return view('poem/content')->with('data', $data);
        } else {
            return redirect('/tho');
        }
    }
    
    public function insertPoem(Request $request) {
        $method = $request->method();
        if ($request->isMethod('post')) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $curentTime = date("Y-m-d H:i:s");
            try {
                $id = DB::table('tho')->insertGetId(
                    [
                        'title' => $request->title, 
                        'slug' => $request->slug,
                        'content' => $request->content,
                        'time' => $request->time
                    ]
                );
                
            } catch (\Exception $e) {
                dd($e);
            }
        }

        return view('poem/admin/insert');
    }
}
