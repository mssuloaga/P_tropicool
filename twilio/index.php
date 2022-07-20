<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'twilio-php-main/src/Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC2ee1ff3872ff34e27ec4f9e0bdca5046"; 
$token  = "7ce6dd8b0481a040787ef86d8196a104"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+56946120688", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "jaucomoaestau" 
                           ) 
                  ); 
 
print($message->sid);