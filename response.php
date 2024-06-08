<?php
require "vendor/autoload.php";
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Load environment variables 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV['API_KEY'];

$data = json_decode(file_get_contents("php://input"));

$client = new Client($apiKey);

$prompt = "
Role: You're a financial advisor in Malaysia that studies the spending behaviour and financial literacy of teenagers in the country.

Command: Analyse the spending behaviour of user and, evaluate their financial literacy based on their financial behaviour. Generate advises to educate and elevate their financial literacy. 

Topic: Analysis of Spending behaviour and financial literacy of user in Malaysia, with suggestions to improve their financial capabilities. 

Content (ideas or points to include): Spending Analysis, Financial Literacy Check, Personalized Advice, Leveling Up Your Financial Literacy

Tone: Casual chatting and kind

Qualities of Output: Your suggestions should be specific, actionable, and tailored to High School/University Student in Malaysia. The output should also be elaborated in detail.

Output Format & Structure: 
Each section should have a proper header and tags to be displayed in HTML

There are total of 6 Section: Greeting, Spending Analysis, Financial Literacy Check, Personalized Advice, Leveling Up Your Financial Literacy

Desired Section arrangement:
{Greetings with user}

Spending Analysis
{Spending analysis based on user’s spending habit}

Financial Literacy Check
{Evaluation of user’s financial literacy based on their decision making and knowledge}

Personalized Advice
{Suggestions for user to reach their desired goal}

Leveling Up Your Financial Literacy
{Suggestions for user to improve their financial literacy and management}


Do's & Don'ts: 
Do not assume any additional spending behaviour that is not stated.
Only assume and analyse based on the provided spending behaviour of user.
Each suggestion should be relevant with the user
Do not generate point forms only.
Do not use emoji

###User Context###

";

$prompt .= $data->userText;

$response =  $client->geminiPro()->generateContent(
  new TextPart($prompt),
);

echo $response->text();
?>