<?php
session_start();
$event = $_GET['id_event'];
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <section id="Desc">
        <?php
        $sql = "SELECT id_event,tanggal,jam,gambar,deskripsi,lokasi,provinsi,event.nama as nama,tanggal,organizer.nama as organizer, harga FROM event JOIN organizer USING (id_organizer) LEFT JOIN tiket USING (id_event) where id_event=$event;";
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
                            <hr>
                            <h6 class="m-0"><?php echo $data['organizer'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <ul>
                        <li><a href="#"></a></li>
                        <li></li>
                    </ul>
                    <div class="container fluid mb-4 p-0">
                        <div class="card border-0 shadow">
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
                                <p><?php echo $data['deskripsi'] ?></p>
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