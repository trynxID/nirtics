<?php
include "layout/header.php";
include "lib/koneksi.php";
?>
<!-- end navbar -->

<!-- ========== Start Banner ========== -->
<section id="banner">
    <?php
    $sql = "SELECT * FROM banner;";
    $sql1 = "SELECT COUNT(nama) as total FROM banner;";
    $result = mysqli_query($link, $sql);
    $result2 = mysqli_query($link, $sql1);
    ?>
    <div class="container py-4">
        <div class="row mx-auto my-auto">
            <div id="crs" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner rounded-5" role="listbox">
                    <div class="row">
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="carousel-item <?= ($no == 1) ? 'active' : '' ?>" data-bs-interval="2000">
                                <div class="col-lg ">
                                    <img src="assets/<?php echo $row['nama'] ?>" class="d-block" alt="<?php echo $row['nama'] ?>">
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <div class="carousel-indicators">
                    <?php
                    $row = mysqli_fetch_assoc($result2);
                    $number = $row['total'];
                    for ($i = 0; $i < $number; $i++) { ?>
                        <button type="button" data-bs-target="#crs" data-bs-slide-to="<?php echo $i ?>" class="<?= ($i == 0) ? 'active' : '' ?>" aria-current="<?= ($i == 0) ? 'true' : 'false' ?>" aria-label="Slide <?php echo $i + 1 ?>"></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== End Banner ========== -->
<!-- ========== Start List Event ========== -->
<section id="featuredEvent">
    <?php
    $sql = "SELECT id_event ,gambar,event.nama as nama,tanggal FROM event where status='ready' order by rand() LIMIT 4; ";
    $result = mysqli_query($link, $sql);
    ?>
    <div class="container">
        <div class="row" text-center mb-3>
            <div class="col mb-3">
                <h2>Featured Event</h2>
            </div>
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 mx-auto">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_event'];
                    $result1 = mysqli_query($link, "SELECT harga from tiket where id_event = $id limit 1 ");
                    while ($row1 = mysqli_fetch_assoc($result1)) {;
                ?>
                        <div class="col pb-2">
                            <div class="card shadow border-0">
                                <img src="assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                <div class="card-body ">
                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 25) ? str_pad(substr($row['nama'], 0, 22), 25, ".") : $row['nama'] ?></h6>
                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                    <h6 class="mb-3 ">
                                        <?php
                                        echo "Rp. ";
                                        echo ((isset($row1['harga'])) ? number_format($row1['harga']) : '-')
                                        ?>
                                    </h6>
                                    <a href="member/desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- ========== End List Event ========== -->
<!-- Musik -->
<section id="musicEvent">
    <?php
    $sql = "SELECT id_event,gambar,event.nama as nama,tanggal FROM event where status='ready' and id_kategori=1 LIMIT 4;";
    $result = mysqli_query($link, $sql);
    ?>
    <div class="container">
        <div class="row" text-center mb-3>
            <div class="col mb-3">
                <h2>Music Event</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_event'];
                    $result1 = mysqli_query($link, "SELECT harga from tiket where id_event = $id limit 1 ");
                    while ($row1 = mysqli_fetch_assoc($result1)) {;
                ?>
                        <div class="col pb-2">
                            <div class="card shadow border-0">
                                <img src="assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                <div class="card-body ">
                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 25) ? str_pad(substr($row['nama'], 0, 22), 25, ".") : $row['nama'] ?></h6>
                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                    <h6>
                                        <?php
                                        echo "Rp. ";
                                        echo ((isset($row1['harga'])) ? number_format($row1['harga']) : '-')
                                        ?>
                                    </h6>
                                    <a href="member/desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- end Musik -->
<!-- Sport -->
<section id="sportEvent">
    <?php
    $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,(SELECT harga from tiket limit 1) as harga FROM event where status='ready' and id_kategori=6 LIMIT 4;";
    $result = mysqli_query($link, $sql);
    ?>
    <div class="container">
        <div class="row" text-center mb-3>
            <div class="col mb-3">
                <h2>Sport Event</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_event'];
                    $result1 = mysqli_query($link, "SELECT harga from tiket where id_event = $id limit 1 ");
                    while ($row1 = mysqli_fetch_assoc($result1)) {; ?>
                        <div class="col pb-2">
                            <div class="card shadow border-0">
                                <div></div>
                                <img src="assets/<?php echo $row['gambar'] ?>" class="d-block rounded">
                                <div class="card-body ">
                                    <h6 class="mb-1"><?php echo (strlen($row['nama']) > 25) ? str_pad(substr($row['nama'], 0, 22), 25, ".") : $row['nama'] ?></h6>
                                    <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                    <h6>
                                        <?php
                                        echo "Rp. ";
                                        echo ((isset($row1['harga'])) ? number_format($row1['harga'], 0, ',', '.') : 'Gratis')
                                        ?>
                                    </h6>
                                    <a href=" member/desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- end Sport -->
<!-- footer -->
<?php
include "layout/footer.php";
?>

<!-- end footer -->