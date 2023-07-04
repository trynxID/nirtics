<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirtics</title>
    <link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/stylesheet.css" type="text/css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow">
            <div class="container">
                <a class="navbar-brand col-ms-3" href="#">
                    <img src="assets/logo.png" width="130" height="35">
                </a>
                <form class="d-flex col-5" role="search">
                    <input class="form-control me-1 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline" type="submit">
                        <img src="assets/search.png" width="24">
                    </button>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#featuredEvent">Explore Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" type="button" class="btn btn-outline-light px-4">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="reg.php" type="button" class="btn btn-primary">Sign-up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>