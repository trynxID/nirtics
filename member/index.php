<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-black h-100">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                            <span class="fs-4">Sidebar</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-black">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-black">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-black">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-black">
                                    Customers
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10">
                    <section id="Home">
                        <?php
                        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,organizer.nama as organizer, harga FROM event JOIN organizer USING (id_organizer) LEFT JOIN tiket USING (id_event) where status='ready' limit 12;";
                        $result = mysqli_query($link, $sql);
                        ?>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            Link with href
                        </a>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                                </div>
                                <div class="dropdown mt-3">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Toggle offcanvas</button>

                        <div class="alert alert-info d-none d-lg-block">Resize your browser to show the responsive offcanvas toggle.</div>

                        <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <p class="mb-0">This is content within an <code>.offcanvas-lg</code>.</p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row" text-center mb-3>
                                <div class="col mt-3">
                                    <p>Showing event</p>
                                </div>
                                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 mx-auto">
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="col pb-2">
                                            <div class="card shadow border-0">
                                                <img src="../assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                                <div class="card-body ">
                                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 25) ? str_pad(substr($row['nama'], 0, 22), 25, ".") : $row['nama'] ?></h6>
                                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                                    <h6 class="mb-3 ">
                                                        <?php
                                                        echo "Rp. ";
                                                        echo ((isset($row['harga'])) ? number_format($row['harga']) : '-')
                                                        ?>
                                                    </h6>
                                                    <hr class="mt-2 mb-2">
                                                    <h6 class="my-auto text-center"><?php echo (strlen($row['organizer']) > 25) ? str_pad(substr($row['organizer'], 0, 22), 25, ".") : $row['organizer'] ?></h6>
                                                    <a href="desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


    </main>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>