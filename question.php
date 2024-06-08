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
        <div class="navbar-expand  ml-auto" id="navbarText;">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link mx-2 active" href="">Page <span class="sr-only"></span></a>
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

    <div class="row" style="margin:30px">
       <h1 style="color: #70A8C2">Questions</h1>
    </div>
    <div class="row" style="margin:30px">
        <h6>A subheading with a brief description of you, your work, and what you’re all about—no biggie</h6>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%; background-color: #E7F4F9; border: none;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%; background-color: #E7F4F9; border: none;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%; background-color: #E7F4F9; border: none;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%; background-color: #E7F4F9; border: none;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row m-5">
        <div class="col-md-12 d-flex align-items-center">
            <div class="progress" style="background-color: #EDE8E3; width: 100%; height: 35px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </div>
    </div>

</body>