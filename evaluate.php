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

<body class="m-3">

  <h1>Financial Advisor</h1>
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
</body>


</html>