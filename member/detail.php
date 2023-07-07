<?php
session_start();
$ses_id = $_SESSION['id'];
$detail = $_SESSION['detail'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <?php
    $sql = "SELECT * FROM detail_transaksi JOIN event USING(id_event) JOIN tiket using (id_tiket) where id_detail= '$detail'";
    $result = mysqli_query($link, $sql);
    $result1 = mysqli_query($link, "SELECT * FROM metode_pembayaran");
    $data = mysqli_fetch_assoc($result);
    $metode = mysqli_fetch_assoc($result1);
    ?>
    <div class="container" style="max-width: 1100px; height:100vh ">
        <div class="row mx-6">
            <section id="detail" class="col-lg-8">
                <H3 class="pt-4">Detail Pemesanan</H3>
                <div class="py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="overflow-hidden">
                                        <img class="card-img-top rounded" src="../assets/<?php echo $data['gambar'] ?>" alt="<?php echo $data['nama'] ?>">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <h5 class="mb-3 fw-medium"><?php echo $data['nama'] ?></h6>
                                        <p class="fs-6 mb-2">
                                            <i class="text-primary fa-solid fa-calendar-days fa-fw pe-3"></i>
                                            <?php echo date("d/m/Y ", strtotime($data['tanggal']))  ?>
                                        </p>
                                        <p class="fs-6 mb-2">
                                            <i class="text-primary fa-solid fa-clock fa-fw pe-3"> </i>
                                            <?php echo date("H.i", strtotime($data['jam'])) ?> WIB
                                        </p>
                                        <p class="fs-6 mb-3">
                                            <i class="text-primary fa-solid fa-location-dot fa-fw pe-3"></i>
                                            <?php echo $data['lokasi'] . ", " . $data['provinsi']   ?>
                                        </p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row justify-content-end text-center">
                                <div class="col-2 me-3">
                                    <h6>Harga</h6>
                                </div>
                                <div class="col-2 me-3">
                                    <h6>Jumlah</h6>
                                </div>
                            </div>
                            <hr class="mt-1 mb-2">
                            <div class="row justify-content-end text-center">
                                <div class="col-2 me-3">
                                    <?php
                                    echo "Rp. ";
                                    echo ((isset($data['harga'])) ? number_format($data['harga'], 0, ',', '.') : '-');
                                    ?>
                                </div>
                                <div class="col-2 me-3">
                                    <?php echo $data['qty'] ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="col-4" style="padding-top: 5rem;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Detail Harga</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col-6 me-3">Total Harga </div>
                                <div class="col text-end">
                                    <?php
                                    echo "Rp. ";
                                    echo number_format($data['total'], 0, ',', '.'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 me-3">Biaya Admin </div>
                                <div class="col text-end">
                                    <?php
                                    echo "Rp. ";
                                    echo number_format($metode['biaya'], 0, ',', '.');
                                    ?>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col">
                                    <h6 class="fw-medium">Total Biaya</h6>
                                </div>
                                <div class="col text-end">
                                    <h6 class="fw-medium">
                                        <?php
                                        echo "Rp. ";
                                        echo number_format(($data['total'] + $metode['biaya']), 0, ',', '.');
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>