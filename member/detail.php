<?php
session_start();
$ses_id = $_SESSION['id'];
$transaksi = $_SESSION['transaksi'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <?php
    $reqData = mysqli_query($link, "SELECT * FROM detail_transaksi LEFT JOIN tiket USING(id_tiket) LEFT JOIN event using (id_event) where id_transaksi= '$transaksi'");
    $reqMetode = mysqli_query($link, "SELECT * FROM metode_pembayaran");
    $reqTiket = mysqli_query($link, "SELECT * FROM detail_transaksi join tiket using (id_tiket) where id_transaksi = $transaksi");
    $data = mysqli_fetch_assoc($reqData);

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
                            <?php
                            while ($tiket = mysqli_fetch_assoc($reqTiket)) {
                            ?>
                                <div class="row justify-content-end text-center">
                                    <div class="col-2 me-3">
                                        <?php
                                        echo "Rp. ";
                                        echo ((isset($tiket['harga'])) ? number_format($tiket['harga'], 0, ',', '.') : '-');
                                        ?>
                                    </div>
                                    <div class="col-2 me-3">
                                        <?php echo $tiket['qty'] ?> </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <div class="col-4 fixed" style="padding-top: 5rem;">
                <div class="row">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Metode Pembayaran</h5>
                            <form action="actBuy.php" method="POST">
                                <?php
                                while ($metode = mysqli_fetch_assoc($reqMetode)) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="Radio<?php echo $metode['id_metode'] ?>" value="<?php echo $metode['nama'] ?>">
                                        <label class="form-check-label" for="Radio<?php echo $metode['id_metode'] ?>">
                                            <?php echo $metode['nama']; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Detail Harga</h5>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 me-3">Total Harga </div>
                                    <?php
                                    $reqTotal1 = mysqli_query($link, "SELECT SUM(dt.subtotal) as total FROM detail_transaksi dt join tiket using (id_tiket) where id_transaksi = $transaksi");
                                    while ($total = mysqli_fetch_assoc($reqTotal1)) {
                                    ?>
                                        <div class="col text-end">
                                            <?php
                                            echo "Rp. ";
                                            echo number_format($total['total'], 0, ',', '.'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <div class="col-6 me-3">Biaya Admin </div>
                                    <div class="col text-end">
                                        <?php
                                        echo "Rp. ";
                                        echo number_format(0, 0, ',', '.');
                                        ?>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="fw-medium">Total Biaya</h6>
                                    </div>
                                    <?php
                                    $reqTotal2 = mysqli_query($link, "SELECT SUM(dt.subtotal) as total FROM detail_transaksi dt join tiket using (id_tiket) where id_transaksi = $transaksi");
                                    while ($total = mysqli_fetch_assoc($reqTotal2)) {
                                    ?>
                                        <div class="col text-end">
                                            <h6 class="fw-medium">
                                                <?php
                                                echo "Rp. ";
                                                echo number_format((($total['total']) + 0), 0, ',', '.');
                                                ?>
                                            </h6>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="actBuy.php">
                        <button class="btn btn-primary w-100" type="submit">Konfirmasi</button>
                    </form>
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