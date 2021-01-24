<?php 

ob_start();

$API_KEY = '1482128188:AAGUN4W1qzDO1r2-EnYt4aN5vHZD-jQA4o8';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
	//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$ali = file_get_contents("data/$from_id/ali.txt");
$ADMIN = 304840620;
$to =  file_get_contents("data/$from_id/token.txt");
$url =  file_get_contents("data/$from_id/url.txt");
//====================ᵗᶦᵏᵃᵖᵖ======================//
if($text == "/start"){

if (!file_exists("data/$from_id/ali.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/ali.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
    
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام من یه ربات کاربردی هستم میتونم کار های زیرو انجام بدم🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
	]
	])
	]);
	}
elseif($text == "منوی اصلی🔁"){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/token.txt","no");
file_put_contents("data/$from_id/url.txt","no");
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"به منوی اصلی برگشتید🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
	]
	])
	]);
	}
//====================ᵗᶦᵏᵃᵖᵖ======================//
elseif($text == "ست وب هوک"){
     sendAction($chat_id, 'typing');
			file_put_contents("data/$from_id/ali.txt","to");
				bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"خوب کاربر عزیز ابتدا توکن ربات خودتون را بفرستید",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"منوی اصلی🔁"]
	],
	]
	])
	]);
	}
elseif($ali == "to"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
    } else{
    file_put_contents("data/$from_id/ali.txt","url");
    file_put_contents("data/$from_id/token.txt",$text);
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب حالا ادرس جای که سورستون قرار داره را بفرستید 

    مثلا:
    https://yoursite.ir/index.php
    
        حتما ابتدا با https://  شروع شود
            
    
    ",
  ]);
}
}
elseif($ali == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
  {
  SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" سایتتون اشتباهه",
  ]);
 }
 else {
 file_put_contents("data/$from_id/ali.txt","no");
 file_put_contents("data/$from_id/url.txt",$text);
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
   	bot('editmessagetext',[
    'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
    'text'=>"کمی صبر کنید .."
  ]);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"ست وب هوک را انجام بدم
    توکن ربات شما :
    $to
    ادرس سورس شما 
    $text
    
    پس دستور زیر را بزن🙃
    /setwebhook",
  ]);
 }
}
elseif($text == "/setwebhook" ){
if($to != "no"){
 	 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"در حال ست کردن وب هوک ",
  ]);
  file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
    sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"وب هوک ست شد  موفق  و موید باشید ",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"به منوی اصلی برگشتید🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
	]
	])
	]);
}

}
/////--------
elseif($text == "اطلاعات توکن" ){
    file_put_contents("data/$from_id/ali.txt","token");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب دوست عزیز توکن خودتون را بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'منوی اصلی🔁']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "token"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"وضعیت توکن : True

خوب اطلاعات ربات شما😉👇
username: @$un
Id : $id
name : $fr
ادرس ست شده سورس:
$ur
",
  ]);
}
}
elseif($text == "دلیت وب هوک" ){
    file_put_contents("data/$from_id/ali.txt","del");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب دوست عزیز توکن خودتون را بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'منوی اصلی🔁']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "del"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"در حال دلیت وب هوک.",
  ]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"دلیت وب هوک با موفقیت انجام شد.",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"به منوی اصلی برگشتید🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
	]
	])
	]);
}
//====================ᵗᶦᵏᵃᵖᵖ======================//
elseif($text == "/panel" && $chat_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"آمار"],['text'=>"پیام همگانی"],['text'=>"فروارد همگانی"]
              ]
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "آمار" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","send");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "send" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","no");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
elseif($text == "فروارد همگانی" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","fwd");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام خودتون را فروراد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "fwd" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","no");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"درحال فروارد",
  ]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت فروارد شد.", 
   ]);
}
//====================ᵗᶦᵏᵃᵖᵖ======================//
?>
