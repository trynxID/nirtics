<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <main>
        <div class="container" style="min-height: 76vh;">
            <div class="row" text-center mb-3>
                <?php include "sidebar.php" ?>
                <div class="col-lg-10 mt-4">
                    <?php
                    include "../lib/koneksi.php";
                    $sql = "SELECT * FROM transaksi left join user using(id_user) left join metode_pembayaran using(id_metode);";

                    $result = mysqli_query($link, $sql);

                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3>List Transaksi</h3>
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>ID</th>
                                                            <th>User</th>
                                                            <th>Metode</th>
                                                            <th>Total</th>
                                                            <th>Tanggal</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $row['id_transaksi']; ?></td>
                                                                <td><?php echo $row['username']; ?></td>
                                                                <td><?php echo $row['nama']; ?></td>
                                                                <td><?php echo $row['total']; ?></td>
                                                                <td><?php echo $row['tanggal']; ?></td>
                                                                <td class="text-center"><?php echo $row['status'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
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

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }
</script>