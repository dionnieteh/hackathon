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

<<<<<<< Updated upstream
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./scripts/collectData.js"></script>
</head>

  <header>
    <img src="logo.png" class="header-logo" alt="App Logo">
  </header>
    
  <body style="background-image:  linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('bg.png'); background-size: cover; background-position: center center;">

  <div class="container centered-container mt-5" id="container">
  <div class="form-container">
    <form id="demographicForm" method="POST">
  <br>

  <form id="demographicForm" method="POST">
    <h2>Demographic Information</h2>
    <div class="mb-3">
      <label for="name" class="form-label">Enter your name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="demographic" class="form-label">What is your demographic?</label>
      <select class="form-select" id="demographic">
        <option selected disabled>Choose One</option>
      </select>
    </div>
    <button type="button" class="btn btn-primary" onclick="submitDemographic()">Submit</button>
  </form>
  <form id="financialForm" method="POST" style="display:none;">
    <h2>Financial Analysis</h2>

  </form>
  <div id="response">
  </div>
  </div>
  
  <br><br>
  <form id="financialForm" method="POST" style="position: absolute; top: 0; margin-top: 150px; visibility: hidden;" class="p-5">
    <h2>Financial Analysis</h2>
  </form>
  
  <div id="response">
  </div>

=======
  <h1>Chat Bot</h1>
  <input type="text" id="text" value="My name is Cheah Shaoren. I'm a High School/ University Student with a monthly allowance of RM300 and monthly income of RM450. Every month I spend a total of around RM90 with RM50 as my fixed monthly mandatory expenses. Other than that, I usually spend RM40 on Games (Board Game, Card Game, Computer Games). I am financially independent and would need to support my own living expenses. I am aiming to save an amount of RM200 each month. I do not have any investments. Lastly, I come from a T20 (RM11,820 or more) household.">

  <br><br>

  <button onclick="generateResponse()" type="button" class="btn btn-primary">Generate Response</button>

  <br><br>

  <div id="response"></div>

  <script src="script.js"></script>
>>>>>>> Stashed changes
</body>

</html>