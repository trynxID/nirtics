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
                    $id_tiket = $_GET['id_tiket'];
                    $sql = "SELECT * FROM tiket where id_tiket=$id_tiket;";
                    $result = mysqli_query($link, $sql);
                    $reqKategori = mysqli_query($link, "SELECT * from kategori");
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <form method="POST" action="ticketEditAct.php">
                                                <input type="hidden" name="id_event" value="<?php echo $id_event; ?>">
                                                <input type="hidden" name="id" value="<?php echo $data['id_tiket']; ?>">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">
                                                        <h5 class="m-0">Ticket Name</h5>
                                                    </label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Price</label>
                                                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok" class="form-label">Stock</label>
                                                    <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $data['stok']; ?>" required>
                                                </div>

                                                <div class="text-start mt-3 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    <a href="ticket.php?id_event=<?php echo $id_event ?>" class="btn btn-secondary">Back</a>
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