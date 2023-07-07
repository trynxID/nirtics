<?php
session_start();
$ses_event;
if (($_SESSION['event'] != 0)) {
    $ses_event = $_SESSION['event'];
} else {
    $_SESSION['event'] = $_GET['id_event'];
    $ses_event = $_SESSION['event'];
}
$ses_id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <section id="Desc">
        <?php
        $sql = "SELECT id_event,tanggal,jam,gambar,deskripsi,lokasi,provinsi,event.nama as nama,tanggal, harga FROM event LEFT JOIN tiket USING (id_tiket) where id_event=$ses_event;";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-xl-6 mb-4 ">
                    <div class="container fluid p-0">
                        <img class="rounded img-fluid" src="../assets/<?php echo $data['gambar'] ?>">
                    </div>
                </div>
                <div class="col-xl-4 mb-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo $data['nama'] ?></h5>
                            <p class="fs-6 mb-1">
                                <i class="text-primary fa-solid fa-calendar-days fa-fw pe-3"></i>
                                <?php echo date("d/m/Y ", strtotime($data['tanggal']))  ?>
                            </p>
                            <p class="fs-6 mb-1">
                                <i class="text-primary fa-solid fa-clock fa-fw pe-3"> </i>
                                <?php echo date("H.i", strtotime($data['jam'])) ?> WIB
                            </p>
                            <p class="fs-6 mb-4">
                                <i class="text-primary fa-solid fa-location-dot fa-fw pe-3"></i>
                                <?php echo $data['lokasi'] . ", " . $data['provinsi']   ?>
                            </p>
                            <h6 class="mb-1 ">
                                <?php
                                echo "Rp. ";
                                echo ((isset($data['harga'])) ? number_format($data['harga'], 0, ',', '.') : '-');
                                $_SESSION['harga'] = $data['harga'];
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <div class="container mb-4 p-0">
                        <div class="card border-0 shadow h-100 ">
                            <div class="card-body">
                                <h5>Deskripsi</h5>
                                <p><?php echo $data['deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ">
                    <div class="container fluid mb-4 p-0">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5>Tiket</h5>
                                <form action="actDesc.php" method="POST">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="minus btn btn-danger btn-number" data-type="minus">
                                                <span class="fa-solid fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" id="qty" name="qty" class="form-control text-center input-number" value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="plus btn btn-success btn-number" data-type="plus">
                                                <span class="fa-solid fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mt-3">Buy</button>
                                </form>
                            </div>

                            <script>
                                jQuery(document).ready(function() {
                                    var quantitiy = 0;
                                    $('.plus').click(function(e) {
                                        e.preventDefault();
                                        var quantity = parseInt($('#qty').val());
                                        $('#qty').val(quantity + 1);
                                    });

                                    $('.minus').click(function(e) {
                                        e.preventDefault();
                                        var quantity = parseInt($('#qty').val());
                                        if (quantity > 0) {
                                            $('#qty').val(quantity - 1);
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
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