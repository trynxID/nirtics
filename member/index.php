<?php
session_start();
$ses_id = $_SESSION['id'];
$_SESSION['event'] = 0;
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
                        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal, harga FROM event LEFT JOIN tiket USING (id_tiket) where status='ready' order by rand() limit 12 ;";
                        $result = mysqli_query($link, $sql);
                        ?>
                        <div class="container">
                            <div class="row" text-center mb-3>
                                <div class="col mt-3">
                                    <p>Showing event</p>
                                </div>
                                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="col pb-2">
                                            <div class="card shadow border-0">
                                                <img src="../assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                                <div class="card-body ">
                                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 25) ? str_pad(substr($row['nama'], 0, 22), 25, ".") : $row['nama'] ?></h6>
                                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                                    <h6 class="mb-1 ">
                                                        <?php
                                                        echo "Rp. ";
                                                        echo ((isset($row['harga'])) ? number_format($row['harga'], 0, ',', '.') : '-')
                                                        ?>
                                                    </h6>

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
        </div>
    </main>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>