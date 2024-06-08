<?php
require "vendor/autoload.php";
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GeminiAPI\Client;
use GeminiAPI\Enums\Role;
use GeminiAPI\Resources\Content;
use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Responses\GenerateContentResponse;

// Load environment variables 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV['API_KEY'];

$json = file_get_contents("php://input");
$data = json_decode($json);

// var_dump($data);
$userText = $data->userText;
$modelText = $data->modelText;

$history = [
  Content::text(
    $userText,
    Role::User
  ),
  Content::text(
    $modelText,
    Role::Model,
  ),
];

$callback = function (GenerateContentResponse $response): void {
  static $count = 0;

  print $response->text();

  $count++;
};


$client = new Client($apiKey);
$chat = $client->geminiPro()
  ->startChat()
  ->withHistory($history);

$chat->sendMessageStream($callback, new TextPart('Provide me the analysis and separate it into different sections with proper line breaks to be displayed in a HTML DOM, it should contain proper header and tags. Each section should end with a <br><br>'));
echo $response->text();
?>