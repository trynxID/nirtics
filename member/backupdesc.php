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
    <section id="Detail">
        <?php
        $sql = "SELECT id_event,deskripsi,tanggal,jam,gambar,lokasi,provinsi,event.nama as nama,tanggal FROM event where id_event=$ses_event;";
        $result = mysqli_query($link, $sql);
        $result1 = mysqli_query($link, "SELECT * FROM tiket where id_event=$ses_event");
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="container">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="desc">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 ">
                    <div class="container p-0">
                        <nav>
                            <div class="nav nav-tabs row-cols-2" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="navDeskripsi" data-bs-toggle="tab" data-bs-target="#nav-deskripsi" type="button" role="tab" aria-controls="nav-deskripsi" aria-selected="true">
                                    <h6>Deskripsi</h6>
                                </button>
                                <button class="nav-link" id="navTiket" data-bs-toggle="tab" data-bs-target="#nav-tiket" type="button" role="tab" aria-controls="nav-tiket" aria-selected="false">
                                    <h6>Tiket</h6>
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-deskripsi" role="tabpanel" aria-labelledby="navDeskripsi" tabindex="0">
                                <div class="card border-0 shadow h-100 ">
                                    <div class="card-body">
                                        <h5>Deskripsi</h5>
                                        <p><?php echo $data['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-tiket" role="tabpanel" aria-labelledby="navTiket" tabindex="0">
                                <div class="card border-0 shadow h-100 ">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <?php while ($tix = mysqli_fetch_array($result1)) { ?>
                                                    <div class="card mb-1">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h6><?php echo $tix['nama'] ?></h6>
                                                                    <?php
                                                                    echo "Rp. ";
                                                                    echo ((isset($tix['harga'])) ? number_format($tix['harga'], 0, ',', '.') : '-');
                                                                    ?>
                                                                </div>
                                                                <div class="col">
                                                                    <form action="actDesc.php" method="post" id="descform" name="descform">
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <button type="button" class="minus<?php echo $tix['id_tiket'] ?> btn btn-danger btn-number" data-type="minus">
                                                                                    <span class="fa-solid fa-minus"></span>
                                                                                </button>
                                                                            </span>
                                                                            <input type="hidden" name="id_tiket" value="<?php echo $tix['id_tiket'] ?>">
                                                                            <input type="hidden" name="harga" value="<?php echo $tix['harga'] ?>">
                                                                            <input type="text" id="qty<?php echo $tix['id_tiket'] ?>" name="qty" class="form-control text-center input-number" value="0">
                                                                            <span class="input-group-btn">
                                                                                <button type="button" class="plus<?php echo $tix['id_tiket'] ?> btn btn-success btn-number" data-type="plus">
                                                                                    <span class="fa-solid fa-plus"></span>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary chart w-100 mt-3">Add to Chart</button>
                                                                    </form>
                                                                    <script>
                                                                        jQuery(document).ready(function() {
                                                                            var quantitiy = 0;
                                                                            $('.plus<?php echo $tix['id_tiket'] ?>').click(function(e) {
                                                                                e.preventDefault();
                                                                                var quantity = parseInt($('#qty<?php echo $tix['id_tiket'] ?>').val());
                                                                                $('#qty<?php echo $tix['id_tiket'] ?>').val(quantity + 1);
                                                                            });
                                                                            $('.minus<?php echo $tix['id_tiket'] ?>').click(function(e) {
                                                                                e.preventDefault();
                                                                                var quantity = parseInt($('#qty<?php echo $tix['id_tiket'] ?>').val());
                                                                                if (quantity > 0) {
                                                                                    $('#qty<?php echo $tix['id_tiket'] ?>').val(quantity - 1);
                                                                                }
                                                                            });
                                                                            $('#descform')
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="margin-top: 40px;">
                    <div class="container fluid mb-4 p-0">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5>Tiket</h5>
                                <?php

                                ?>
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
    </section>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>