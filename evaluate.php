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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center flex-column" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('./images/bg.png'); background-size: cover; background-position: center center;">
  <header class="col-12 py-2">
    <img src="./images/logo.png" class="header-logo" alt="App Logo">
  </header>

  <!--Container-->
  <div class="col-12 pt-5 d-flex justify-content-center align-items-center" style="min-height:92vh">
    <div class="p-0 m-0 template" style="width:50%;">
      <form id="demographicForm" method="POST">
        <div class="d-flex px-5">
          <div class="col-5 pe-2 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column mb-3">
              <h3 class="fw-bold">Tell Us About <span style="color:#F6931A"><u>You</u></span></h3>
              <p class="text-muted" style="font-size:0.7rem">Let us get to know you better to provide a detailed and personalized financial literacy assessment. </p>
            </div>
            <img src="./images/debt.png" class="img-fluid pb-5" style="height:50%">
          </div>

          <div class="col-7 ps-5 py-5 my-4 d-flex flex-column justify-content-center border-start height-75" id="demographicForm" method="POST">
            <div class="col-12 mb-5">
              <label for="name" class="form-label pb-1 fw-semibold">What is your name?</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="off">
            </div>
            <div class="col-12">
              <label for="demographic" class="form-label pb-1 fw-semibold">What is your demographic?</label>
              <select class="form-select" id="demographic">
                <option selected disabled>Choose One</option>
              </select>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end">
              <button type="button" id="button" class="btn mt-5 btn-success" onclick="submitDemographic()">Next
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-2 bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </form>
      <form id="financialForm" class="row p-4 m-3" method="POST" style="display: none;">

      </form>
      <div id="response" class="row p-4 m-3" method="POST" style="display: none;">

      </div>
    </div>
  </div>
  </div>

</body>

</html>