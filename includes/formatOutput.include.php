<?php
function formatOutput($name, $html)
{
  $dom = new DOMDocument;
  @$dom->loadHTML($html);

  $data = [
    "greeting" => '',
    "spendingAnalysis" => '',
    "spendingAnalysisDetails" => "",
    "financialLiteracyCheck" => '',
    "personalizedAdvice" => '',
    "personalizedAdviceDetails" => "",
    "levelingUpFinancialLiteracy" => '',
    "levelingUpFinancialLiteracyDetails" => "",
    "conclusion" => ''
  ];

  $body = $dom->getElementsByTagName('body')->item(0);
  $sections = $body->childNodes;


  foreach ($sections as $section) {
    // h2 or h3 being use as section headings
    if ($section->nodeName === 'h3' || $section->nodeName === 'h2') {
      $nextElement = $section->nextSibling->nextSibling; // Avoid repetitive DOM access.

      switch (true) {
        case strpos($section->nodeValue, 'Greetings') !== false:
          $data["greeting"] .= $dom->saveHTML($nextElement);
          break;
        case strpos($section->nodeValue, 'Spending Analysis') !== false:
          $data["spendingAnalysis"] .= $dom->saveHTML($nextElement);
          if ($nextElement->nextSibling->nextSibling->nodeName !== 'h3' && $nextElement->nextSibling->nextSibling->nodeName !== 'h2') {
            $data["spendingAnalysisDetails"] .= $dom->saveHTML($nextElement->nextSibling->nextSibling);
          }
          break;
        case strpos($section->nodeValue, 'Financial Literacy Check') !== false:
          $data["financialLiteracyCheck"] .= $dom->saveHTML($nextElement);
          break;
        case strpos($section->nodeValue, 'Personalized Advice') !== false:
          $data["personalizedAdvice"] .= $dom->saveHTML($nextElement);
          // Improved logic to find a <ul> element.
          $currentElement = $nextElement->nextSibling;
          while ($currentElement != null && $currentElement->nodeName !== 'h2' && $currentElement->nodeName !== 'h3') {
            if ($currentElement->nodeName === 'ul') {
              $data["personalizedAdviceDetails"] .= $dom->saveHTML($currentElement);
              break;
            }
            $currentElement = $currentElement->nextSibling;
          }
          break;
        case strpos($section->nodeValue, 'Leveling Up Your Financial Literacy') !== false:
          $data["levelingUpFinancialLiteracy"] .= $dom->saveHTML($nextElement);
          // Improved logic to find a <ul> element.
          $currentElement = $nextElement->nextSibling;
          while ($currentElement != null && $currentElement->nodeName !== 'h2' && $currentElement->nodeName !== 'h3') {
            if ($currentElement->nodeName === 'ul') {
              $data["levelingUpFinancialLiteracyDetails"] .= $dom->saveHTML($currentElement);
              break;
            }
            $currentElement = $currentElement->nextSibling;
          }
          break;
        case strpos($section->nodeValue, 'Conclusion') !== false:
          $data["conclusion"] .= $dom->saveHTML($nextElement);
          break;
      }
    }
  }

  $greeting = $data['greeting'];
  $spendingAnalysis = $data['spendingAnalysis'];
  $spendingAnalysisDetails = $data['spendingAnalysisDetails'];
  $financialLiteracyCheck = $data['financialLiteracyCheck'];
  $personalizedAdvice = $data['personalizedAdvice'];
  $personalizedAdviceDetails = $data['personalizedAdviceDetails'];
  $levelingUpFinancialLiteracy = $data['levelingUpFinancialLiteracy'];
  $levelingUpFinancialLiteracyDetails = $data['levelingUpFinancialLiteracyDetails'];
  $conclusion = $data['conclusion'];

  $html = "
    <h4>Greetings <span style='color:#F6931A'><u>$name</u></span>!</h3>
    $greeting
    <h6 class='mt-3' style='color:#036D19'>Spending Analysis</h6>
    $spendingAnalysis
    <div class='d-flex'>
      $spendingAnalysisDetails
    </div>
    <h6 class='mt-3' style='color:#036D19'>Financial Literacy Check</h6>
    <div class='dottedBorder p-3 m-2 me-4' style='width:98%'>
      $financialLiteracyCheck
    </div>
    <h6 class='mt-4' style='color:#036D19'>Personalized Advice</h6>
    <div class='d-flex mt-1'>
      $personalizedAdviceDetails
    </div>
    <h6 class='mt-2' style='color:#036D19'>Leveling Up Your Financial Literacy</h6>
    <div class='d-flex mt-1'>
      $levelingUpFinancialLiteracyDetails
    </div>
    <h4 class='mt-2'>Conclusion</h4>
    $conclusion
    <div class='d-flex justify-content-center'>
      <button class='btn btn-success mt-5' onClick='window.location.reload();'>Complete</button>
    </div>
  ";

  $html = trim($html, '"');

  $html = str_replace("\n", "", $html);
  $html = str_replace("\r", "", $html);


  $html = str_replace('{name}', $name, $html);

  $html = str_replace('<p>', '<p class=\'mb-0\' style=\'text-align: justify; text-justify: inter-word;\'>', $html);
  
  
  return $html;
}
