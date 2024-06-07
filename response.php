<?php
require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$data = json_decode(file_get_contents("php://input"));

$text = $data->text;
$apiKey = "AIzaSyDP5hBFoBfibXltol8IfiNxm5Yg0FDPggA";
$client = new Client($apiKey);

$response =  $client->geminiPro()->generateContent(
  new TextPart($text),
);

echo $response->text();
?>