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

Command: 
- Analyse the spending behaviour of user 
- Evaluate their financial literacy based on their financial behaviour. 
- Generate advises to educate and elevate their financial literacy. 

Topic: Analysis of Spending behaviour and financial literacy of user in Malaysia, with suggestions to improve their financial capabilities. 

Content (ideas or points to include): Spending Analysis, Financial Literacy Check, Personalized Advice, Leveling Up Your Financial Literacy

Tone: Friendly and casual tone, as if you are chatting with the user.

Qualities of Output: 
- Your suggestions must be specific, actionable, and tailored to High School/University Student in Malaysia. 
- The output must be elaborated in detail and longer (Approximate 50 words).
- The elaboration must be relevant to the user's spending behaviour and financial literacy.

Output Format & Structure: 

- The output should be in HTML format.
- The header for each section must be enclosed with <h2> tags.
- The subheader for each section must be enclosed with <h3> tags.
- The content of each section must be enclosed with <p> tags.
- Each section should end with a <br> tag.

- There are total of 6 Section: Greeting, Spending Analysis, Financial Literacy Check, Personalized Advice, Leveling Up Your Financial Literacy

- Desired Section arrangement:
{Greetings with user}

Spending Analysis
{Spending analysis based on user’s spending habit}

Financial Literacy Check
{Evaluation of user’s financial literacy based on their decision making and knowledge}

Personalized Advice
{Suggestions for user to reach their desired goal}

Leveling Up Your Financial Literacy
{Suggestions for user to improve their financial literacy and management}

Conclusion
{Enter brief ending conclusion and salutation here}


Do's & Don'ts: 
- Do not assume any user's spending that is not stated.
- Do not generate point forms only. 
- Must be elaborated.
- Do not use emoji.
- Do not judge or comment on the user's household background.
- Do not assume the user's interest or hobbies.
- Do not assume the user's existing financial knowledge.
- Only assume and analyze based on the provided spending behavior of user.
- Each suggestion should be relevant with the user.

###User Context###
";

$prompt .= $data->userText;

$response =  $client->geminiPro()->generateContent(
  new TextPart($prompt),
);

echo $response->text();
?>