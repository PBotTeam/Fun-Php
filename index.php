<?php
/*
به نام خداوند مهربان
این سورس طی 2 روز نوشته شده است و روی آن زحمت کشیده شده است
لطفا کپی رایت را رعایت فرمایید
دارای لایسنس
BSD 2-Clause
*/
ob_start();
define('API_KEY','XXXX:XXXX:XXXX:XXXX'); //محل قرار گیری توکن
$admin =  "XXXXXX"; // محل قرار گیری ایدی ادمین
$update = json_decode(file_get_contents('php://input'));
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$text = $update->message->text;
$message_id = $update->callback_query->message->message_id;
$message_id_feed = $update->message->message_id;

$fals = file_get_contents("https://apio.a7n.ir/falhafez/");
$jok = file_get_contents("https://api-mramirhossein.ml/bot/joke.php");
$love = file_get_contents("http://hektor-tm.ir/api/asheghane/index.php");
$dastan = file_get_contents("http://api.roonx.com/dastankotah/index.php");
$qt = $update->inline_query->query;
$chistan = file_get_contents("http://api-mramirhossein.ml/bot/chistan.php");
$danstaniha = file_get_contents("http://hektor-tm.ir/api/danestani/");
$time= file_get_contents("http://api.roonx.com/date-time/?PBotTeam=time");
$qt = $update->inline_query->query;
$abouttext = file_get_contents("abouts.txt");
$date= file_get_contents("http://api.roonx.com/date-time/?PBotTeam=date");
$jomlak = file_get_contents("http://api-mramirhossein.ml/bot/jomlak.php");
$zekr = file_get_contents("http://hektor-tm.ir/api/zekr/");
$sangin = file_get_contents("http://hektor-tm.ir/api/sangin/index.php");
$tarfand = file_get_contents("http://hektor-tm.ir/api/tarfand/");
$hadis = file_get_contents("http://hektor-tm.ir/api/hadis/");
$doa = file_get_contents("http://hektor-tm.ir/api/today-Pray/");
$dastanak = file_get_contents("http://api.roonx.com/dastankotah/index.php");
$user = file_get_contents('Member.txt');
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
function PBotTeam($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
if(preg_match('/^\/([Ss]tart)/',$text)){
PBotTeam('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"سلام دوست عزیز به بهترین ربات سرگرمی تلگرام خوش امدید
          این ربات از نظر سرعت و امکانات یکی از بهترین ربات های تلگرامی در قسمت سرگرمیه
          برای اطلاع از اخرین اخبار و حمایت از ما در کانال ما عضو شوید👨🏼‍🎨
@PBotTeam",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
	  ['text'=>'📿بخش اعتقادات و مذهبی','callback_data'=>'menu1']
	  ],[
     ['text'=>'😍بخش متنهای دوست داشتنی','callback_data'=>'menu2']
          ],
		  [
		    ['text'=>'🔖بخش کاربردی ها','callback_data'=>'menu3']
			]
		]
		])
  ]);
}elseif ($data == "date") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"📆تاریخ امروز: $date",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'زمان🕰','callback_data'=>'time']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "menu") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"سلام دوست عزیز به بهترین ربات سرگرمی تلگرام خوش امدید
          این ربات از نظر سرعت و امکانات یکی از بهترین ربات های تلگرامی در قسمت سرگرمیه
          برای اطلاع از اخرین اخبار و حمایت از ما در کانال ما عضو شوید👨🏼‍🎨
@NewsBotApi",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
	  ['text'=>'📿بخش اعتقادات و مذهبی','callback_data'=>'menu1']
	  ],[
     ['text'=>'😍بخش متنهای دوست داشتنی','callback_data'=>'menu2']
          ],
		  [
		    ['text'=>'🔖بخش کاربردی ها','callback_data'=>'menu3']
			]]
		])
  ]);
}elseif ($data == "menu1") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"به بخش اعتفادات و مذهبی خوش امدید
  یکی را انتخاب کنید :",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
		['text'=>'گرفتن فال📮','callback_data'=>'fal']
      ],[
	    ['text'=>'دعای روز🙏','callback_data'=>'doa']
	  ],[
	    ['text'=>'حدیث📇','callback_data'=>'hadis']
	  ],[
	    ['text'=>'ذکر امروز🗓','callback_data'=>'zekr']
	  ],[
	    ['text'=>'بازگشت به منوی اصلی🔙','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "dastanak") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$dastan,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
	    ['text'=>'دریافت داستانک دیگر','callback_data'=>'dastanak']
	  ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "menu2") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"به بخش متن های دوست داشتنی خوش امدید
  یکی را انتخاب کنید :",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'عاشقانه❤️','callback_data'=>'love']
      ],[
	    ['text'=>'سنگین😧','callback_data'=>'sangin']
	  ],[
	    ['text'=>'داستانک😺','callback_data'=>'dastanak'],['text'=>'دانستنیها🙃','callback_data'=>'danestani']
	  ],[
	    ['text'=>'چیستان🤔','callback_data'=>'chistan'],['text'=>'ترفند😳','callback_data'=>'tarfand']
	  ],[
	    ['text'=>'جملک😏','callback_data'=>'jomlak'],['text'=>'جوک😂','callback_data'=>'joke']
	  ],[
	    ['text'=>'بازگشت به منوی اصلی🔙','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "menu3") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"به بخش کاربردی ها خوش امدید
  یکی را انتخاب کنید",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'زمان🕰','callback_data'=>'time']
      ],[
	    ['text'=>'تاریخ📆','callback_data'=>'date']
	  ],[
	    ['text'=>'تعداد کاربران📊','callback_data'=>'users']
	  ],[
	    ['text'=>'درباره ما™','callback_data'=>'about'],['text'=>'راهنما📜','callback_data'=>'help']
	  ],[
	    ['text'=>'بازگشت به منوی اصلی🔙','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "joke") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$jok,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'یه جوک دیگه','callback_data'=>'joke']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }		elseif ($data == "love") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$love,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'دریافت متن عاشقانه دیگر','callback_data'=>'love']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }	elseif ($data == "zekr") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$zekr,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }		elseif ($data == "fal") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$fals,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'گرفتن فال دوباره','callback_data'=>'fal']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "jomlak") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$jomlak,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'دریافت جملک دیگر','callback_data'=>'jomlak']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "sangin") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$sangin,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'دریافت متن سنگین دیگر','callback_data'=>'sangin']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "tarfand") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$tarfand,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'دریافت ترفند دیگر','callback_data'=>'tarfand']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "hadis") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$hadis,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'گرفتن حدیث دوباره','callback_data'=>'hadis']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "danestani") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$danestani,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
		['text'=>'دریافت دانستنی دیگر','callback_data'=>'danestani']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "doa") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$doa,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	 [
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "time") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"🕰ساعت هم اکنون:$time",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
		['text'=>'تاریخ📆','callback_data'=>'date']
      ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "about") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$abouttext,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
		['text'=>'سازنده ربات',url=>"https://t.me/KingOfTyper"],['text'=>'همین حالا 5 ستاره دهید',url=>"https://t.me/storebot?start=YourFunBot"]
      ],[
	  ['text'=>'Api نویس سایت',url=>"https://t.me/KingOfTyper"],['text'=>'اسپانسرتیم',url=>"https://t.me/KingOfTyper"]
	  ],[
	  ['text'=>'پی بات تیم',url=>"https://t.me/PBotTeam"],['text'=>'کانال اخبار ربات',url=>"https://t.me/PBotTeam"]
	  ],[
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "help") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"ليست دستورات ربات :
      🔵تعداد کاربران
      دريافت تعداد کاربران ربات
      🔵ذکر امروز
      دريافت ذکر امروز
      🔵درباره ما
      اطلاعاتي در مورد ربات وسازندگان
      🔵گرفتن فال
      دريافت فال
      🔵عاشقانه
      دريافت متن هاي عاشقانه
      🔵سنگين
      دريافت متن هاي سنگين
      🔵ترفند
      دريافت ترفند
      🔵حديث
      دريافت حديث
      🔵جوک
      دريافت جوک
      🔵تاریخ
      دریافت حال حاضر روز/ماه/سال اکنون
      🔵زمان
      ساعت و دقیقه اکنون
   🔵دانستنیها
     دانستنیهای باحال
      🔵دعای روز
     دعای مخصوص همان روز به زبان عربی
   🔵جملک
     پر از تیکه و جوک",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "users") {
	$user = file_get_contents('Member.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"تعداد کاربران : 
	$member_count",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "chistan") {
  PBotTeam('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$chistan,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
	    ['text'=>'بازگشت به منوی اصلی','callback_data'=>'menu']
	  ]
      ]
    ])
  ]);
 }

elseif(preg_match('/^\/([Ss]tats)/',$text) and $from_id == $admin){
    $user = file_get_contents('Member.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
    PBotTeam('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"تعداد کل اعضا: $member_count",
      'parse_mode'=>'HTML'
    ]);
}unlink("error_log");
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }

	?>
