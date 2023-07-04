<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <section id="Home">
        <?php
        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,organizer.nama as organizer, harga FROM event JOIN organizer USING (id_organizer) LEFT JOIN tiket USING (id_event) where status='ready' limit 12;";
        $result = mysqli_query($link, $sql);
        ?>
        <div class=" container">
            <div class="row" text-center mb-3>
                <div class="col mt-3">
                    <p>Showing event</p>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col pb-2">
                            <div class="card h-100">
                                <img src="../assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                <div class="card-body ">
                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 28) ? str_pad(substr($row['nama'], 0, 25), 28, ".") : $row['nama'] ?></h6>
                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                    <h6 class="mb-0 ">
                                        <?php
                                        echo "Rp. ";
                                        echo ((isset($row['harga'])) ? number_format($row['harga']) : '-')
                                        ?>
                                    </h6>
                                </div>
                                <div class="text-center mt-0 pt-0">
                                    <a href="login.php" class="btn btn-primary d-block align-text-bottom">Buy</a>
                                </div>
                                <div class="text-center card-footer">
                                    <h6><?php echo $row['organizer'] ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>