<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="./scripts/collectData.js"></script>
</head>

<body>
  <div class="container-fluid p-0 m-0 min-vh-100 d-flex flex-column">
    <div class="row flex-grow-1">
      <div class="col-4 d-none d-md-block p-0">
        <img src="./images/home.png" class="img-fluid" style="height: 100vh;">
      </div>
      <div class="col pt-5 pb-4 d-flex flex-column">
        <div class="row pt-5">
          <div class="col pt-5">
            <h1>Your <mark class="py-0" style="border-radius:10px; background-color: #F6931A; color: white">AI-powered</mark> Financial Analyst</h1>
            <p class="pt-3" style="font-size:1.25rem;">Get personalised insights on your spending behaviour and improve your financial literacy.</p>
            <a class="btn mt-5 py-2 px-3" id="homeBtn" href="evaluate.php" role="button">Take the Quiz Now <i class="bi bi-arrow-right" style="padding-left: 10px"></i></a>
          </div>
        </div>
        <div class="row d-flex align-items-end">
          <div class="col">
            <img src="./images/goal4.png" class="img-fluid">
          </div>
          <div class="col">
            <img src="./images/home_bg.png" class="img-fluid" style="height: 250px">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>