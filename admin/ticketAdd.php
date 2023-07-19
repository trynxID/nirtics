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
                    $id_event = $_GET['id_event'];
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $reqEvent = mysqli_query($link, "SELECT * from event where id_event= $id_event");
                                            $event = mysqli_fetch_assoc($reqEvent);
                                            ?>
                                            <h3>Add Ticket : <?php echo $event['nama'] ?> </h3>
                                            <form method="POST" action="ticketAddAct.php">
                                                <input type="hidden" name="id" value="<?php echo $id_event; ?>">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Ticket Name</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Price</label>
                                                    <input type="text" class="form-control" id="harga" name="harga" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok" class="form-label">Stock</label>
                                                    <input type="text" class="form-control" id="stok" name="stok" required>
                                                </div>
                                                <div class="text-start mt-3 mb-3">
                                                    <button type="submit" class="btn btn-primary">Add Ticket</button>
                                                    <a href="ticket.php" class="btn btn-secondary">Back</a>
                                                </div>
                                            </form>
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