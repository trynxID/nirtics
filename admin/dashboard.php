<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <main>
        <div class="container-fluid" style="min-height: 76vh;">
            <div class="row" text-center mb-3>
                <?php include "sidebar.php" ?>
                <div class="col-lg-10 mt-4">
                    <?php
                    include "../lib/koneksi.php";
                    $sql = "SELECT * FROM amount;";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Category</h5>
                                            <h5>Events </h5>
                                            <h5>Payment Method</h5>
                                            <h5>Transaction</h5>
                                            <h5>User</h5>
                                        </div>
                                        <div class="col">
                                            <h5>: <?php echo $data['kategori'] ?></h5>
                                            <h5>: <?php echo $data['event'] ?></h5>
                                            <h5>: <?php echo $data['metode'] ?></h5>
                                            <h5>: <?php echo $data['transaksi'] ?></h5>
                                            <h5>: <?php echo $data['user'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>