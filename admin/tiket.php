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
                    $id_event = $_GET['id_event'];
                    $sql = "SELECT * FROM tiket where id_event=$id_event;";
                    $result = mysqli_query($link, $sql);
                    $reqEvent = mysqli_query($link, "SELECT * FROM event where id_event=$id_event;");
                    $event = mysqli_fetch_assoc($reqEvent);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3>Tiket <?php echo $event['nama']  ?></h3>
                                            <div class="text-start mt-3 mb-3">
                                                <a href="addTicket.php" class="btn btn-primary">Add Ticket</a>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Jenis Tiket</th>
                                                        <th>Harga</th>
                                                        <th>Stok</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $data['nama']; ?></td>
                                                            <td><?php echo $data['harga']; ?></td>
                                                            <td><?php echo $data['stok']; ?></td>
                                                            <td class="mx-0 px-0 text-center">
                                                                <a href="editEvent.php?id_event=<?php echo $data['id_event']; ?>" class="btn btn-primary">Manage</a>
                                                                <a href="delete.php?id_event=<?php echo $data['id_event']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                                                                <a href="editTiket.php?id_event=<?php echo $data['id_event']; ?>" class="btn btn-success">Ticket</a>
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