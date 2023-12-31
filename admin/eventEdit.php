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
                    $sql = "SELECT * FROM event where id_event=$id_event;";
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
                                            <form method="POST" action="eventEditAct.php" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $data['id_event']; ?>">
                                                <div class="mb-3">
                                                    <h5>Event Image</h5>
                                                    <img src="../assets/<?php echo $data['gambar']; ?>" class="rounded w-50" alt="Poster">
                                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                                    <input type="hidden" name="default" value="<?php echo $data['gambar'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">
                                                        <h5 class="m-0">Event Name</h5>
                                                    </label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">
                                                        <h5 class="m-0">Description</h5>
                                                    </label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo $data['deskripsi']; ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">
                                                        <h5 class="m-0">Date</h5>
                                                    </label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jam" class="form-label">
                                                        <h5 class="m-0">Time</h5>
                                                    </label>
                                                    <input type="time" class="form-control" id="jam" name="jam" value="<?php echo $data['jam']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lokasi" class="form-label">
                                                        <h5 class="m-0">Location</h5>
                                                    </label>
                                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $data['lokasi']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">
                                                        <h5 class="m-0">Status</h5>
                                                    </label>
                                                    <select class="form-control" id="status" name="status" required>
                                                        <option value="ready" <?php echo ($data['status'] === 'ready') ? 'selected' : ''; ?>>
                                                            Ready
                                                        </option>
                                                        <option value="closed" <?php echo ($data['status'] === 'closed') ? 'selected' : ''; ?>>
                                                            Closed
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="provinsi" class="form-label">
                                                        <h5 class="m-0">Province</h5>
                                                    </label>
                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $data['provinsi']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">
                                                        <h5 class="m-0">Category</h5>
                                                    </label>
                                                    <select class="form-control" id="kategori" name="kategori" required>
                                                        <?php while ($kategori = mysqli_fetch_assoc($reqKategori)) {  ?>
                                                            <option value="<?php echo $kategori['id_kategori'] ?>" <?php echo ($data['id_kategori'] === $kategori['id_kategori']) ? 'selected' : ''; ?>>
                                                                <?php echo $kategori['nama'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="text-start mt-3 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    <a href="event.php" class="btn btn-secondary">Back</a>
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