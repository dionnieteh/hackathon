<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light p-3 m-3">
    <a class="navbar-brand" href="#" style="color: #50B359; font-weight: bold;">
      <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
      Site name
    </a>
    <div class="navbar-expand  ml-auto" id="navbarText;">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link mx-2" href="#" style="padding:10px; width: 85px; background-color: #50B359; border-radius: 10px; text-align: center; color: white;">Page
            <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">Page</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">Page</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12 ml-4 mt-4">
        <h1 style="color: #70A8C2">Results</h1>
      </div>
      <div class="col-md-12 ml-4">Hey there! It's great that you're thinking about your finances. Let's break down your spending and see what we can do.</div>
    </div>

    <div id="response">

  </div>

    <div class="row">

      <div class="col-md-12">
        <h6 style="color: #50B359;" class="m-4">Spending Analysis</h6>
      </div>

      <div class="col-md-6 mt-2">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      </div>

      <div class="col-3 d-flex flex-column float-left justify-content-center mt-5">
        <div class="mb-2">Hobbies</div>
        <div class="mb-2">Clothing</div>
        Food
      </div>

      <div class="col-3 d-flex flex-column align-items-center justify-content-center mt-5" style="font-weight: bold;">
        <div class="mb-2">25%</div>
        <div class="mb-2">25%</div>
        50%
      </div>

      <div class="col-md-12">
        <h6 style="color: #50B359;" class="m-4">Financial Analysis</h6>
      </div>

      <div class="col-md-12">
        <div class="card" style="width: 100%; color: white; background-color: #70A8C2; border: none; border-radius: 15px;">
          <div class="card-body">
            <p class="card-text">It's awesome that you're already tracking your spending. That's a big step towards financial literacy. However, since you're still in school and don't have an income, we need to focus on managing your expenses wisely.</p>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <h6 style="color: #50B359;" class="m-4">Personalized Advice</h6>
        <p style="white-space: pre-wrap;" class="m-4">Here are a few tips tailored just for you:

          The "Want" vs. "Need" Game: Think of your arcade trips as "wants". While fun, they're not essential like food or school supplies (those are "needs"). Challenge yourself to cut back on arcade visits to once a week or set a lower budget, say RM50, and see if you can stick to it.

          The Power of Saving: Even with a small amount, saving is magical! Let's say you save RM50 from your entertainment money each month. In just 6 months, you could buy something really cool you've been wanting.

          Talk to the Money Master: Your parents or guardians are your own personal financial superheroes! Talk to them about your spending and saving goals. They can offer guidance and maybe even match your savings – how cool is that?</p>
      </div>

      <div class="col-md-12">
        <h6 style="color: #50B359;" class="m-4">Level Up Your Financial Literacy</h6>
        <p style="white-space: pre-wrap;" class="m-4">Track Your Spending: Keep a small notebook or use a mobile app to jot down everything you spend for a month. You'll be surprised where your money goes!</p>
      </div>

      <div class="col-md-12 mb-3" style="text-align: center;">
        <button type="submit" class="btn mt-3" style="width: 20%; padding: 10px; background-color: #50B359; color: white; border-radius: 15px;">Done</button>
      </div>


    </div>


  </div>

</body>

</html>

<script>
  var xValues = ["Hobbies", "Food", "Clothing"];
  var yValues = [25, 50, 25];
  var barColors = [
    "#FF8400",
    "#1F45FC",
    "#FF9999"
  ];

  new Chart("myChart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    }
  });
</script>