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
    <section id="Detail" class="my-3">
        <?php
        $sql = "SELECT id_event,deskripsi,tanggal,jam,gambar,lokasi,provinsi,event.nama as nama,tanggal FROM event JOIN tiket USING (id_event) where id_event=$ses_event;";
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
                    <ul class="nav nav-pills nav-fill" id="descTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="deskripsiTab" data-bs-toggle="tab" data-bs-target="#deskripsiTabPane" type="button" role="tab" aria-controls="deskripsiTabPane" aria-selected="true">DESCRIPTION</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="tiketTab" data-bs-toggle="tab" data-bs-target="#tiketTabPane" type="button" role="tab" aria-controls="tiketTabPane" aria-selected="true">TICKET</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="descTabContent">
                        <div class="tab-pane fade show active" id="deskripsiTabPane" role="tabpanel" aria-labelledby="deskripsiTab" tabindex="0">
                            <div class="card border-0 shadow h-100 ">
                                <div class="card-body">
                                    <h5>DESCRIPTION</h5>
                                    <p><?php echo $data['deskripsi'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tiketTabPane" role="tabpanel" aria-labelledby="tiketTab" tabindex="0">
                            <div class="card border-0 shadow h-100 ">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <form id="formPilihTiket">
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
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="minus<?php echo $tix['id_tiket'] ?> btn btn-danger btn-number" data-type="minus">
                                                                                <span class="fa-solid fa-minus"></span>
                                                                            </button>
                                                                        </span>
                                                                        <input name="tiketId[]" type="hidden" value="<?php echo $tix['id_tiket'] ?>">
                                                                        <input name="qty[]" type="text" id="qty<?php echo $tix['id_tiket'] ?>" class="form-control text-center input-number" value="0">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="plus<?php echo $tix['id_tiket'] ?> btn btn-success btn-number" data-type="plus">
                                                                                <span class="fa-solid fa-plus"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                    <script>
                                                                        jQuery(document).ready(function() {
                                                                            var quantitiy = 0;
                                                                            $('.plus<?php echo $tix['id_tiket'] ?>').click(function(e) {
                                                                                e.preventDefault();
                                                                                var quantity = parseInt($('#qty<?php echo $tix['id_tiket'] ?>').val());
                                                                                $('#qty<?php echo $tix['id_tiket'] ?>').val(quantity + 1);
                                                                                pilihTiket();
                                                                            });

                                                                            $('.minus<?php echo $tix['id_tiket'] ?>').click(function(e) {
                                                                                e.preventDefault();
                                                                                var quantity = parseInt($('#qty<?php echo $tix['id_tiket'] ?>').val());
                                                                                if (quantity > 0) {
                                                                                    $('#qty<?php echo $tix['id_tiket'] ?>').val(quantity - 1);
                                                                                }
                                                                                pilihTiket();
                                                                            });

                                                                            $('#qty<?php echo $tix['id_tiket'] ?>').change(function(e) {
                                                                                pilihTiket();
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="container fluid mb-4 p-0">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5>TICKET</h5>
                                <form action="actDesc.php" method="POST">
                                    <div class="row" id="tiketTerpilih">
                                        <div class="col-lg-12">
                                            <p class="text-center text-secondary">-- Select Ticket --</p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary w-100 mt-3">
                                        <h6 class=" m-0">CONFIRM</h6>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function pilihTiket() {
            $.ajax({
                url: 'actSelect.php',
                type: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(document.getElementById('formPilihTiket')),
                success: function(data) {
                    if (data.code == 200) {
                        let tiket = '';
                        $.each(data.tiket, function(index, value) {
                            tiket += `<div class="col-lg-12">
                            <input name="tiketId[]" type="hidden" value="${value.tiketId}">
                            <input name="qty[]" type="hidden" value="${value.qty}">
                            <input name="total[]" type="hidden" value="${value.harga * value.qty}">
                            <h6>${value.tiket}</h6>
                            <div class="d-flex justify-content-between">
                            <span>${value.qty} Tiket</span>
                            <span class="fw-bold">Rp ${(value.harga * value.qty)}</span>
                            </div>
                            <hr>
                            </div>`;
                        });
                        $('#tiketTerpilih').html(tiket);
                    } else if (data.code == 400) {
                        console.log(data.message);
                    } else {
                        console.log(data.message);
                    }
                },
                error: function(jqXHR, textStatus) {
                    var errorMessage = '';
                    if (jqXHR.status === 0) {
                        errorMessage = 'Not connected.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        errorMessage = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        errorMessage = 'Internal Server Error [500].';
                    } else if (textStatus === 'parsererror') {
                        errorMessage = 'Requested JSON parse failed.';
                    } else if (textStatus === 'timeout') {
                        errorMessage = 'Time out error.';
                    } else if (textStatus === 'abort') {
                        errorMessage = 'Ajax request aborted.';
                    } else {
                        errorMessage = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(`Error ${jqXHR.status}\n${errorMessage}`)
                }
            });
        };
    </script>

<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>