<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body style="background-color: #EBEBEB">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
            Site name
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Page <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="row">
        <div class="col-md-12 ml-4 mt-4">
            <h1>Results</h1>
        </div>
        <div class="col-md-12 ml-4">Hey there! It's great that you're thinking about your finances. Let's break down
            your spending and see what we can do.</div>
    </div>

    <div class="row">
    <div class="col-md-1 mt-5"></div>
    <div class="col-md-6 mt-5">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div>
    <div class="col-md-2 d-flex flex-column float-left justify-content-center mt-5">
    <div class="mb-2">Hobbies</div>
    <div class="mb-2">Clothing</div>
    Food
    </div>
    <div class="col-md-1 d-flex flex-column align-items-center justify-content-center mt-5">
    <div class="mb-2">25%</div>
    <div class="mb-2">25%</div>
    50%
    </div>
    <div class="col-md-1 mt-5"></div>
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