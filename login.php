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
                    <a class="nav-link mx-2" href="#" style="padding:10px; width: 85px; background-color: #50B359; border-radius: 10px; text-align: center; color: white;">Page <span class="sr-only">(current)</span></a>
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex flex-column align-items-center mt-5">
                    <h1 style="color: #70A8C2">Sign In to your Account</h1>
                    <h6>Enter your email to sign up for this app</h6>
                </div>
                <form>
                    <input type="text" class="form-control mt-5 p-3" id="" placeholder="Email Address/Username" style="width: 100%; border-radius: 15px; height: 60px;">
                    <input type="password" class="form-control mt-3 p-3" id="" placeholder="Password" style="width: 100%; border-radius: 15px; height: 60px;">
                    <button type="submit" class="btn mt-3" style="width: 100%; padding: 15px; background-color: #70A8C2; color: white; border-radius: 15px;">Sign in</button>
                </form>
            </div>
        </div>
    </div>

</body>