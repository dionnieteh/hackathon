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

    <div class="row" style="margin:30px">
        <h1>Questions</h1>
    </div>
    <div class="row" style="margin:30px">
        <h6>A subheading with a brief description of you, your work, and what you’re all about—no biggie</h6>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Answer</h5>
                        <p class="card-text">Description of your answer</p>
                        <input type="hidden" name="" value="">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="progress" style="background-color: grey; width: 100%; height: 25px">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">25%</div>
                        <input type="hidden" name="" value="">
                </div>
            </div>
            <div class="col-md-6">

                <button type="submit" class="btn btn-dark mt-3" style="width: auto; float:right;">Next</button>

            </div>
        </div>
    </div>

</body>