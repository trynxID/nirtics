<?php
session_start();
$ses_id = $_SESSION['id'];
$_SESSION['event'] = 0;
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <div class="container" style="min-height: 76vh;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <section id="mytiket">
                    <?php
                    $sql = "SELECT * from mytiket where id_user=$ses_id and status='SUKSES' order by tanggal_transaksi desc";
                    $reqData = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row" text-center mb-3>
                            <div class="col mt-3">
                                <p>My Ticket</p>
                            </div>
                            <div class="contaier">
                                <div class="row">
                                    <?php
                                    while ($data = mysqli_fetch_assoc($reqData)) {
                                    ?>
                                        <div class="card mb-2 shadow border-0">
                                            <div class="card-header text-success m-0 p-0" style="background-color: white;">
                                                <?php echo $data['status'] ?>
                                            </div>
                                            <div class="card-body">
                                                <h5> <?php echo $data['event'] ?></h5>
                                                <span>
                                                    <i class="text-primary fa-solid fa-calendar-days fa-fw pe-3"></i>
                                                    <?php echo $data['event'] ?>
                                                    |
                                                    <?php echo $data['qty'] ?>
                                                    Tiket
                                                    <?php echo $data['tiket'] ?>
                                                </span>
                                                <span>
                                                    <br>
                                                    Pembelian pada
                                                    <?php echo date("d M Y, H:i:s ", strtotime($data['tanggal_transaksi']))  ?>
                                                </span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
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