<?php
session_start();
$ses_id = $_SESSION['id'];
$_SESSION['event'] = 0;
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <div class="container-fluid" style="min-height: 76vh;">
        <div class="row">
            <?php include "filter.php"; ?>
            <div class="col-lg-10">
                <section id="Home">
                    <?php
                    $sql = "";
                    if (isset($_GET['kategori'])) {
                        $kategori = $_GET['kategori'];
                        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,kategori.nama as kat FROM event JOIN kategori USING(id_kategori) where status='ready' and kategori.nama='$kategori' order by nama asc ;";
                    } else if (isset($_GET['provinsi'])) {
                        $provinsi = $_GET['provinsi'];
                        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,provinsi FROM event where status='ready' and provinsi='$provinsi' order by nama asc ;";
                    } else {
                        $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,kategori.nama as kat,provinsi FROM event JOIN kategori USING(id_kategori) where status='ready' order by nama asc;";
                    }
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row" text-center mb-3>
                            <div class="col mt-3">
                                <p>Showing event</p>
                            </div>
                            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_event'];
                                    $result1 = mysqli_query($link, "SELECT harga from tiket where id_event = $id limit 1 ");
                                    while ($row1 = mysqli_fetch_assoc($result1)) {;
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
                                                        echo ((isset($row1['harga'])) ? number_format($row1['harga'], 0, ',', '.') : 'Gratis')
                                                        ?>
                                                    </h6>

                                                    <a href="desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>