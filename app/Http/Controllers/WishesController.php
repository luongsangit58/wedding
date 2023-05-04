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

    protected $loiChuc = [
        [
            'email' => 'cuong.ftu.97@gmail.com',
            'name' => 'Kudo Nguyen',
            'content' => 'Chúc 2 bạn hundred năm hạnh phúc, hãy enjoy cái moment này nhé.'
        ],
        [
            'email' => 'ngothihuong1974@gmail.com',
            'name' => 'Mẹ iu',
            'content' => 'Thật may mắn hai con đã tìm thấy nhau trong cuộc đời rộng lớn này. Bố mẹ cảm thấy rất vui mừng khi được chứng kiến khoảnh khắc tuyệt đẹp này của hai con. Hai con hãy đối xử thật tốt với nhau, cùng nhau tận hưởng những giây phút hạnh phúc trong cuộc sống. Dù trước mắt sẽ còn nhiều khó khăn và thách thức, nhưng bố mẹ tin tưởng rằng bằng tình yêu chân thành, hai con sẽ vượt quá tất cả. Chúc hai con mãi mãi hp.'
        ],
        [
            'email' => 'nguyenthanhtinhanh08@gmail.com',
            'name' => 'Thành nguyễn',
            'content' => 'Chúc 2 em trăm năm hạnh phúc, bên nhau vượt qua mọi buồn vui trong cuộc sống nhé.'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'quanganhthtc@gmail.com',
            'name' => 'Q Anh',
            'content' => 'Chuc mung đoi ban tre. Chuc hai ban mai hanh phuc ben nhau!'
        ],
        [
            'email' => 'nguyetvt0105@gmail.com',
            'name' => 'Nguyệt cute Anh 6',
            'content' => 'Tình yêu 10 năm của Sang Trang, nghe tên vần nhỉ. Hihi. Chúc tình yêu của 2 bạn vẫn luôn như những ngày đầu nhé. 10 năm không phải là ngắn, 2 bạn đã vượt qua được chặng đường dài như thế để đến với nhau, vậy chặng đường sau này cả hai hãy cùng cố gắng để luôn hạnh phúc nhé. Chúc mừng hai bạn. Ký tên Nguyệt cute hehe'
        ],
        [
            'email' => 'hoaithanhnuce@gmail.com',
            'name' => 'Thanh con bố Cương mẹ Ngân',
            'content' => 'Một cuộc sống mới đang chờ đón các bạn và mình mong rằng nó sẽ tràn đầy những tháng ngày hạnh phúc. Chúc đôi bạn trẻ có một đám cưới thật hạnh phúc, vui vẻ, luôn bên nhau vượt qua mọi khó khăn thử thách để xây dựng một gia đình đầm ấm.'
        ],
        [
            'email' => 'ngocnguyen9840@gmail.com',
            'name' => 'Nguyễn Minh Ngọc',
            'content' => 'Chúc hai em mãi hạnh phúc bên nhau. Luôn sống đời yêu thương, nhẫn nại và kiên định trong hôn nhân.'
        ],
        [
            'email' => 'doisytrung2701@gmail.com',
            'name' => 'Trung (Thánh)',
            'content' => 'Chúc mừng hạnh phúc đôi bạn trẻ! Chúc hai bạn có một đám cưới trọn vẹn niềm vui, một cuộc sống hạnh phúc, như ý. “Hôn nhân không phải là nơi thuyền tình cập bến mà là nơi hai người yêu nhau quyết định cùng giăng buồm vượt sóng ra khơi”. Chúc hai bạn luôn hạnh phúc và nắm tay nhau đi đến hết cuộc đời!'
        ],
        [
            'email' => 'uyenmyt.ig@gmail.com',
            'name' => 'Chị UyenMyt Xinh Đáng yêu Dễ Thương',
            'content' => 'Không có gì quý giá hơn là có một người bạn đời thấu hiểu và cùng nhau trải qua mọi giai đoạn của thanh xuân. Mong hai em sẽ luôn hạnh phúc và cùng nhau đi qua thêm nhiều giai đoạn nữa của cuộc sống người lớn và cuộc sống về già nữa nhé! iêu thưn rất rất nhiều!!!!'
        ],
        [
            'email' => 'truonghan.espeed@gmail.com',
            'name' => 'Trường hán',
            'content' => 'Đám cưới của 2 đứa chắc là đám cưới mà t mọng chờ nhất trong số tất cả những người mà t quen biết. Ty quá dài, quá đẹp và cuối cùng cũng viên mãn khi về được với nhau. Nhìn vào 2 đứa cho t rất nhiều niềm tin về ty chân thành đó. Chúc 2 đứa thật thật hạnh phúc nhé!!!'
        ],
        [
            'email' => 'linhhn.1019@gmail.com',
            'name' => 'Hoàng Linh',
            'content' => 'Chúc anh chị trăm năm hạnh phúc ạ. Rất là ngưỡng mộ tình iu của anh chị lunnnn ý. So sweet. Best wish for you :3'
        ],
        [
            'email' => 'laithenhatminh@gmail.com',
            'name' => 'Nhật Minh',
            'content' => 'Em chúc mừng hai anh chị. Nhân ngày trọng đại của hai anh chị, em chúc anh chị ngày ngày ân ái, mãi bên nhau trọn đời. Happy wedding!'
        ],
        [
            'email' => 'freenie17@gmail.com',
            'name' => 'Lan Anh',
            'content' => 'Chúc hai bạn đáng yêu của tui trăm năm hạnh phúc! Love you <3'
        ],
        [
            'email' => 'quynhdt.fgc@gmail.com',
            'name' => 'Quynh Seaturtle',
            'content' => 'Chúc mừng câu chuyện tình yêu đẹp như cổ tích của hai đứa bước sang một chương mới nhé! Chặng đường sắp tới cho đến sau này luôn cùng nhau vững bước nha~ <3 Happy Wedding!!!'
        ],
        [
            'email' => 'lephuongduy3695@gmail.com',
            'name' => 'Đố biết :v',
            'content' => 'Chúc Trang bé và Sang luôn hiểu, bên nhau và quan tâm chăm sóc đùm bọc nhau suốt quãng đường sắp tới. Ngưỡng mộ thật sự huhu! Hai đứa hạnh phúc nhaaa!'
        ],
        [
            'email' => 'vokimanh92@gmail.com',
            'name' => 'Kim Anh',
            'content' => 'Chúc anh chị hạnh phúc, vui vẻ và sớm có tin vui nhé'
        ],
        [
            'email' => 'binhnt3991@gmail.com',
            'name' => 'Binh NT',
            'content' => 'chuyện tình lãng mạng quá. chúc hạnh phúc 2 em.'
        ],
        [
            'email' => 'bachdc@vinhomes.vn',
            'name' => 'Mr Bách',
            'content' => 'Chúc anh chị trăm năm hạnh phúc, thuận vợ thuận chồng!'
        ],
        [
            'email' => 'hanhtran2312.neu@gmail.com',
            'name' => 'Hạnh xinh',
            'content' => 'Nhìn thấy Sang đèo Trang lên quả dốc số 8 giữa trời nắng gắt, mình biết đó không phải là một điều ai cũng làm được. Đến tận bh, hình ảnh đó vẫn còn đang rõ ràng trong đầu mình. Mong rằng, bằng tất cả những tình yêu, sự cố gắng, hy sinh, chăm sóc ấy, Sang sẽ luôn là điểm tựa hạnh phúc cho Trang. Yêu!'
        ],
        [
            'email' => 'kien.112.1998@gmail.com',
            'name' => 'Em Kiên',
            'content' => 'Chắc anh không nhớ em đâu, nhưng mà e thấy ngưỡng mộ tình yêu 10 năm của 2 anh chị lắm ạ! Chúc 2 anh chị hạnh phúc ạ!'
        ],
        [
            'email' => 'lehoangdieptt11233@gmail.com',
            'name' => 'Lê Hoàng Diệp',
            'content' => 'Một tình yêu tuyệt đẹp được củng cố vững chắc theo năm tháng. Cô thât xúc động khi đoc những dòng này. Chúc 2 cháu yêu của cô mãi HP bên nhau như thế ! Gửi ngàn lời yêu thương tới 2 đứa.'
        ],
        [
            'email' => 'anhntv1511@gmail.com',
            'name' => 'Chị gái',
            'content' => 'Khởi đầu cuộc sống mới, mở ra một chương mới của 2 em. Chúc 2 em mãi hạnh phúc, hãy vững tin, bao dung và ghi nhớ về nhau nhé. Sẽ có đôi lúc trong chuyến hành trình này mình vô tình hay cố ý lạc mất nhau, nhưng hãy nhớ lại và nhìn lại vì sao mình đến được với nhau. Mong ngày được thấy 2 em nắm chặt tay nhau trên lễ đường ngập hoa nha.'
        ],
        [
            'email' => 'tienlx9@fpt.com.vn',
            'name' => 'Em TiếnLX đẹp trai',
            'content' => 'Chúc anh chị trăm năm hạnh phúc nhá <3 <3 <3'
        ],
        [
            'email' => 'ngocntb@gmail.com',
            'name' => 'Ngọc',
            'content' => 'Chúc 2 em trăm năm hạnh phúc!'
        ],
        [
            'email' => 'loandt7493@gmail.com',
            'name' => 'E Loan-GlobalBiz',
            'content' => 'E chúc anh chị “sang trang” mới ngập tràn niềm vui, hạnh phúc, sớm có con đàn cháu đống nha ^^'
        ],
        [
            'email' => 'itchangetheworld@gmail.com',
            'name' => 'Tạ Thanh Phương',
            'content' => 'Chúc mừng hạnh phúc hai vợ chồng em nhé. Chúc hai em trăm năm hạnh phúc và đạt được nhiều thành công nhé.'
        ],
        [
            'email' => 'phamngsinh39@gmail.com',
            'name' => 'Sinh',
            'content' => 'Chúc hai bạn có cuộc sống mới ngập tràn niềm vui và hạnh phúc'
        ],
        [
            'email' => 'lehoangngocbs@gmail.com',
            'name' => 'Lê Ngọc',
            'content' => 'Em xin chúc anh chị có một tiệc cưới chọn vẹn nhất, và sống với nhau đầm ấm, vui vẻ, hạnh phúc. Chúc tình yêu của anh chị mãi mãi bền chặt không bao giờ lìa xa <3'
        ],
        [
            'email' => 'bachvietubnd@gmail.com',
            'name' => 'Bạch Trọng Viêt (Bạn của Bố Nam)',
            'content' => 'Chúc mừng hạnh phúc của hai Cháu'
        ],
        [
            'email' => 'long.nv.29052003@gmail.com',
            'name' => 'Long',
            'content' => 'Chúc anh chị thật nhiều hạnh phúc nhé. Mong mọi điều tốt đẹp sẽ đến với anh chị!'
        ],
        [
            'email' => 'tran.thanhvan7898@gmail.com',
            'name' => 'Đứa Nhỏ Mãi Chưa Lớn',
            'content' => 'Hoà cùng ngày hân hoan cũng như nhân dịp ngày trọng đại của cuộc đời mình, em chúc anh cùng nửa kia của mình có một cuộc sống hạnh phúc và mỹ mãn. Chúc phúc cho cuộc tình đẹp của đôi bạn trẻ sau thời gian dài đã gặt hái được trái ngọt mãi sẽ bền lâu cùng thời gian. Và với những gì tốt đẹp nhất, một lần nữa em xin chia vui cùng anh chị và gia đình mình. Chúc cho mọi điều tốt đẹp nhất sẽ đến với mỗi người trong chúng ta.'
        ],
        [
            'email' => 'doantrang020697@gmail.com',
            'name' => 'Doãn trang xinh gái',
            'content' => 'Chúc 2 anh chị hạnh phúc'
        ],
        [
            'email' => 'mailoan97bs@hmail.com',
            'name' => 'Mai Loan',
            'content' => 'Happy wedding Sang Trang. Chúc 2 đứa luôn luôn hạnh phúc, sớm đón tin vui nha <3'
        ],
        [
            'email' => 'phutrung2504@gmail.com',
            'name' => 'Phú Trung',
            'content' => 'Chúc 2 bạn Hạnh Phúc ngập tràn nhé ! Ngưỡng mộ tình yêu bền đẹp này từ hồi học cấp 3.'
        ],
        [
            'email' => 'tongduyhung97@gmail.com',
            'name' => 'Tống Duy Hưng',
            'content' => 'Mừng hạnh phúc đôi bạn trẻ, mãi bên nhau đến lúc đầu long răng bạc nhé hehe :))'
        ],
        [
            'email' => 'thaokun.kute9x@gmail.com',
            'name' => 'Thảo',
            'content' => 'Chúc đôi b trẻ trăm năm hạnh phúc nhé :3'
        ],
        [
            'email' => 'nguyenhoanghai.bs@gmail.com',
            'name' => 'Hải',
            'content' => 'Thật ngưỡng mộ câu chuyện của hai bạn, Chúc hai bạn trăm năm hạnh phúc nhé :D'
        ]
    ];

    public function index() {
        $wishes = $this->loiChuc;
        // $wishes = DB::table('loi_chuc')->get()->toArray();
        shuffle($wishes);
        $data = array_slice($wishes, 0, 6);
        foreach ($data as $key => $value) {
            $data[$key]['email'] = $this->obfuscateEmail($value['email']);
        }
        // $luckyDraw = DB::table('loi_chuc')->where('lucky_draw', '1')->get()->toArray();
        // foreach ($luckyDraw as $key => $value) {
        //     $value->email = $this->obfuscateEmail($value->email);
        // }

        $luckyDraw = [];

        return view("index", [
            "wishes" => $data,
            'luckydraw' => $luckyDraw
        ]);
    }

    // Get all
    public function getWishes() {
        $wishes = $this->loiChuc;
        // $wishes = DB::table('loi_chuc')->get()->toArray();
        shuffle($wishes);
        foreach ($wishes as $key => $value) {
            $wishes[$key]['email'] = $this->obfuscateEmail($value['email']);
        }

        return view('wisheslist')->with('wishes', $wishes);
    }

    // Get all keys
    public function getKeyWishes() {
        // $keyes = DB::table('loi_chuc')->select('key')->get()->toArray();
        // $listKeyes = [];
        // foreach ($keyes as $value) {
        //     $listKeyes[] += $value->key;
        // }

        $listKeyes = [];
        return $listKeyes;
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
        // Check Recaptcha
        $googleResponse = $request->google_response;
        $checkDataRecaptcha = $this->checkDataRecaptcha($googleResponse);
        if (is_array($checkDataRecaptcha)) {
            if ($checkDataRecaptcha['success'] != 1) {
                return response()->json([
                    'error' => 500, // Loi Recaptcha
                    'data' => 'Lỗi xác thực Recaptcha. Vui lòng tải lại!'
                ]);
            }
        } else {
            return response()->json([
                'error' => 500, // Loi Recaptcha
                'data' => 'Lỗi xác thực Recaptcha. Vui lòng tải lại!'
            ]);
        }

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

        // Check trung key
        $key = $this->genUid(4);
        // if (in_array($key, $this->getKeyWishes())) {
        //     return response()->json([
        //         'error' => 500, // Loi trung key
        //         'data' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau. Xin cảm ơn!'
        //     ]);
        // }

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
                    'data' => 'Đã có lỗi xảy ra với dữ liệu bạn nhập. Vui lòng thử lại sau!'
                ]);
            }
               
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
            
            return response()->json([
                'error' => 0,
                'data' => $id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 500,
                'data' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau. Xin cảm ơn!'
            ]);
        }

        return response()->json([
            'error' => 500,
            'data' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau. Xin cảm ơn!'
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

    public function getDataRecaptcha($url, $dataArray)
    {
        $ch = curl_init();
        $data = http_build_query($dataArray);
        $getUrl = $url."?".$data;
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
         
        $response = curl_exec($ch);
        if(curl_error($ch)){
            return 'Request Error:' . curl_error($ch);
        } else {
            return json_decode($response,true);
        }

        curl_close($ch);
    }
    
    public function checkDataRecaptcha($googleResponse)
    {
        $urlGoogleCaptcha = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptchaSecretKey = '6LcYGGIkAAAAAKYJG6YhiElJ-VLwoAdwpxs85kKz';
        $dataArray = [
            'secret' => $recaptchaSecretKey,
            'response' => $googleResponse
        ];
        $recaptchaResonse = $this->getDataRecaptcha($urlGoogleCaptcha, $dataArray);

        return $recaptchaResonse;
    }
}
