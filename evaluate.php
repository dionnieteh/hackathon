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
  <link href="style.css" rel="stylesheet">
  <script src="./scripts/collectData.js"></script>
</head>
<header>
  <img src="./images/logo.png" class="header-logo" alt="App Logo">
</header>

<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('./images/bg.png'); background-size: cover; background-position: center center;">

  <div class="container centered-container mt-4" id="container">
    <div class="form-container">
      <form id="demographicForm" method="POST">
        <h2 id="category">Demographic Information</h2>
        <div class="mt-4"  >
          <label for="name" class="form-label">What should we call you?</label>
          <input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off">
        </div>
        <div class="mt-4">
          <label for="demographic" class="form-label">What is your demographic?</label>
          <select class="form-select" id="demographic">
            <option selected disabled>Choose One</option>
          </select>
        </div>
        <button type="button" id="button" class="btn mt-4" onclick="submitDemographic()">Next</button>
      </form>

      <form id="financialForm" method="POST" style="display:none;">
        <h2 id="category">Financial Analysis</h2>

      </form>

      <div id="response">

      </div>
    </div>
  </div>
</body>


</html>