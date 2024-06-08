<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

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

$json = file_get_contents('php://input');
$data = json_decode($json);

$client = new Client($apiKey);

$prompt = $data->modelText;

$prompt .= "
Command:  
- Analyse the spending behaviour of user  
- Evaluate their financial literacy based on their financial behaviour.  
- Generate advises to educate and elevate their financial literacy.  

Topic: Analysis of Spending behaviour and financial literacy of people in Malaysia, with suggestions to improve their financial capabilities.  
Content (ideas or points to include): Spending Analysis, Financial Literacy Check, Personalized Advice, Leveling Up Your Financial Literacy 
Tone: Friendly and casual tone, as if you are chatting with the user. 


Qualities of Output:  
- Your suggestions must be specific, actionable, and tailored to High School/University Student, Retirees and Adults in Malaysia.  
- The output must be elaborated in detail and longer (An addtional of approximately 50 words). 
- The elaboration must be exactly the same to the user's spending behaviour and financial literacy. 

Output Format & Structure:  
- The output should be in HTML format.
- The header for each section must be enclosed with <h2> tags.
- The suggestions in point forms must be enclosed with <ul> tags
- The key phrases/points must be enclosed with <b> tags
- The content of each section must be enclosed with <p> tags.
- Each section should end with a <br> tag.  `
- You must add this line of code after the Spending Analysis tag: <canvas id='financialChart' width='400' height='400'></canvas>

Do's & Don'ts: 
- Do not assume any user's spending that is not stated.
- Do not generate point forms only. 
- Must be elaborated.
- Do not use emoji.
- Do not judge or comment on the user's household background.
- Do not assume the user's interest or hobbies.
- Do not assume the user's existing financial knowledge.
- Only assume and analyze based on the provided spending behavior of user.
- Each suggestion must align with and can help the user.
- The Spending Analysis must include a breakdown of their financial input.
- The financial literacy section must include what kind of financial decisions the user is making as shown in the sample output below.
- Explain the financial literacy section with more details at around 150 words.
- You should try to prioritise suggesting students to save, adults to invest and elderies on scam awareness and retirement funds.
- The suggestions must be returned in HTML format, following the tags in the sample output.

Sample Output:
<h2> Greetings <span style='color:#F6931A'><u>{name}</u></span> !</h2>
<p>Hi {name}, {elaboration based on user's spending behaviour or goal}.</p>

<h3>Spending Analysis</h3>
<canvas id='financialChart' style='width: 400; height: 400'></canvas>
<p>Your total monthly expenses come up  to RM{totalExpenses}...</p>

<h3>Financial Literacy Check</h3>
<p>Based on your spending habits, you seem to be making {condition} financial decisions.</p>

<h3>Personalized Advice</h3>
<p>To help you reach your goal ...{elaborate}, here are a few personalized suggestions:
<ul>
  <li><b>{Suggestion 1}</b>: {Suggestion 1 Elaboration}.</li>
  <li><b>{Suggestion 2}</b>: {Suggestion 2 Elaboration}.</li>
  <li><b>{Suggestion 3}</b>: {Suggestion 3 Elaboration}.</li>
</ul>
</p>

<h3>Leveling Up Your Financial Literacy</h3>
<p>In addition to the personalized advice above, here are some tips to help you level up your financial literacy:
<ul>
  <li><b>{Suggestion 1}</b>: {Suggestion 1 Elaboration}.</li>
  <li><b>{Suggestion 2}</b>: {Suggestion 2 Elaboration}.</li>
  <li><b>{Suggestion 3}</b>: {Suggestion 3 Elaboration}.</li>
</li>
</p>

<h2><u>Conclusion</u></h2>
<p>{name}, you're off to a solid start on your financial journey. By implementing these suggestions and continuing to educate yourself, you'll be well on your way to achieving your goal of saving RM200 each month. Remember, small steps taken consistently lead to significant progress. Keep up the momentum and enjoy the journey towards financial freedom.</p>

###User Context###
";

$prompt .= $data->userText;

$response =  $client->geminiPro()->generateContent(
  new TextPart($prompt),
);

echo $response->text();
?>