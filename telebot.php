<?php
define('BOT_TOKEN', 'BOT_TOKEN');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$new_chat = $update["message"]["new_chat_member"]["first_name"];

// compose reply
$reply =  sendMessage($new_chat);

// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);

function sendMessage($new_chat_member ){
    if ($new_chat_member === NULL)
       {
        $message = "I am a test bot.";
       }
       else {
           $message = "welcome ".$new_chat_member;
       }
return $message;
}
?>
