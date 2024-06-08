<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>
<body>
  <?php
  ?>

  <h1>Chat Bot</h1>
  <input type="text" id="text" value="My name is Cheah Shaoren. I'm a High School/ University Student with a monthly allowance of RM300 and monthly income of RM450. Every month I spend a total of around RM90 with RM50 as my fixed monthly mandatory expenses. Other than that, I usually spend RM40 on Games (Board Game, Card Game, Computer Games). I am financially independent and would need to support my own living expenses. I am aiming to save an amount of RM200 each month. I do not have any investments. Lastly, I come from a T20 (RM11,820 or more) household.">

  <br><br>

  <button onclick="generateResponse()" type="button" class="btn btn-primary">Generate Response</button>

  <br><br>

  <div id="response"></div>

  <script src="script.js"></script>
</body>

</html>