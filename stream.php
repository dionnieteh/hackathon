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

$history = [
  Content::text(
    <<<TEXT
    I'm a secondary school student with no income. 
    Every month I spend around RM250. 
    I usually will spend RM150 into my hobbies and entertainment. 
    I would go to the arcade with my friend frequently at Sunway Pyramid. 
    I do not have any investments.
    TEXT,
    Role::User
  ),
  Content::text(
    <<<TEXT
        You're a financial advisor in Malaysia that studies the spending behavior and financial literacy of teenagers in the country. 
        Based on their spending lifestyle, provide personalized advise cater to them and analyze whether their financial literacy is sufficient. 
        Explain to them as if you're explaining to people aging between 12 - 18 years old.
        TEXT,
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
