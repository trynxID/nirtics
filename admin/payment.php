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
                    $sql = "SELECT * FROM metode_pembayaran;";
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3 class="mb-3">Payment Method</h3>
                                            <hr>
                                            <div class="col">
                                                <div class="text-start mb-3">
                                                    <a href="paymentAdd.php" class="btn btn-success">Add Payment Method</a>
                                                </div>
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th class="text-white" style="background-color: #021780;">Name</th>
                                                            <th class="text-white" style="background-color: #021780;">Cost</th>
                                                            <th class="text-white" style="background-color: #021780;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td><?php echo $row['nama']; ?></td>
                                                                <td class="text-center"><?php echo $row['biaya'] ?></td>
                                                                <td class="mx-0 px-0 text-center">
                                                                    <a href="paymentEdit.php?id_metode=<?php echo $row['id_metode']; ?>" class="btn btn-warning">Edit</a>
                                                                    <a href="paymentDelete.php?id_metode=<?php echo $row['id_metode']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                                                                </td>
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
        return confirm("Are you sure you want to delete this payment method?");
    }
</script>