<?php
require "vendor/autoload.php";
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Load environment variables 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$data = json_decode(file_get_contents("php://input"));

$text = $data->text;
$apiKey = $_ENV['API_KEY'];
$client = new Client($apiKey);

$response =  $client->geminiPro()->generateContent(
  new TextPart($text),
);

echo $response->text();
?>