<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirtics</title>
    <link rel="stylesheet" href="layout/stylesheet.css" type="text/css" />
    <link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <?php include "../lib/koneksi.php";
        $query = mysqli_query($link, "SELECT * FROM user where id_user = '$id'");
        $data = mysqli_fetch_assoc($query);
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark shadow">
            <div class="container">
                <a class="navbar-brand col-ms-3" href="index.php">
                    <img src="../assets/logo.png" width="130" height="35">
                </a>
                <form class="d-flex col-5" role="search">
                    <input class="form-control me-1 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline" type="submit">
                        <img src="../assets/search.png" width="24">
                    </button>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#featuredEvent">My Ticket</a>
                        </li>
                        <li class="nav-item my-auto">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="avatar" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/default.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                    <?php echo $data['fullname'] ?>
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="avatar">
                                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>