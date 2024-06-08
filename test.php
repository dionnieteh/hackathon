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
  <script src="./scripts/collectData.js"></script>

  <style>
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light p-3 m-3">
      <a class="navbar-brand" href="#" style="color: #50B359; font-weight: bold;">
          <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
          Site name
      </a>
      <div class="navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link mx-2" href="#" style="padding:10px; width: 85px; background-color: #50B359; border-radius: 10px; text-align: center; color: white;">Page</a>
              </li>
              <li class="nav-item mx-2">
                  <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item mx-2">
                  <a class="nav-link" href="#">Page</a>
              </li>
          </ul>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </nav>

  <h1>Financial Advisor</h1>
  <br>
  <form id="demographicForm" method="POST">
    <h2>Demographic Information</h2>
    <div class="mb-3">
      <label for="name" class="form-label">Enter your name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="off">
    </div>
    <div class="row" style="margin:30px">
      <h6>A subheading with a brief description of you, your work, and what you’re all about—no biggie</h6>
    </div>
    <button type="button" class="btn btn-primary" onclick="submitDemographic()">Submit</button>
  </form>
  <form id="financialForm" method="POST" style="display:none;">
    <h2>Financial Analysis</h2>

  </form>
  <div id="response">
  </div>
  </div>
</body>

</html>